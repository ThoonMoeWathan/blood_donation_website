<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    // direct list page
    public function list(){
        $events = Events::when(request('key'),function($query){
            $query->where('event_name','like','%'. request('key') .'%');
        })
        ->orderBy('id','desc')
        ->paginate(5);
        // $events->appends(request()->all());
        return view('admin.eventPost.list',compact('events'));
    }
    // direct events create page
    public function createPage(){
        return view('admin.eventPost.create');
    }
    // create events
    public function create(Request $request) {
        $this->eventValidationCheck($request);
        $data = $this->requestEventData($request);

        // Handle image upload
        if ($request->hasFile('image')) {
            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }

        Events::create($data);
        return redirect()->route('events#list');
    }

    // direct edit page
    public function edit($id){
        $events=Events::where('id',$id)->first();
        return view('admin.eventPost.edit',compact('events'));
    }
    // update event
    public function update($id,Request $request){
        // dd($request->toArray());
        $this->eventValidationCheck($request);
        $data = $this->requestEventData($request);

        // for image
        if($request->hasFile('image')){
            // 1. old image name | check => delete | store
            $dbImage=Events::where('id',$id)->first();
            $dbImage=$dbImage->image;

            if($dbImage!=null){
                Storage::delete('public/'.$dbImage);
            }
            $fileName=uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image']=$fileName;
        }

        Events::where('id',$id)->update($data);
        return redirect()->route('events#list')->with(['updateSuccess'=>'Event post has been updated.']);
    }

    // delete event
    public function delete($id){
        $eventToDelete = Events::findOrFail($id);
        if ($eventToDelete->image) {
            Storage::disk('public')->delete($eventToDelete->image);
        }
        Events::where('id', $id)->delete();
        return redirect()->route('events#list');
    }

    // validation for creation of blood types
    private function eventValidationCheck($request){
        Validator::make($request->all(),[
            'eventName'=>'required',
            'image' => 'mimes:png,jpg,jpeg,webp|file',
            'description'=>'required',
            'place'=>'required',
            'date'=>'required',
            'time'=>'required'
        ])->validate();
    }
    // request blood group data
    private function requestEventData($request) {
        return [
            'event_name' => $request->eventName,
            'description' => $request->description,
            'place' => $request->place,
            'date' => $request->date,
            'time' => $request->time,
        ];
    }

}
