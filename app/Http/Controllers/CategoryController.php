<?php

namespace App\Http\Controllers;

use App\Models\Blood_Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // diret list page
    public function list(){
        $categories = Blood_Group::when(request('key'),function($query){
            $query->where('blood_type','like','%'. request('key') .'%');
        })
        ->orderBy('id','desc')
        ->paginate(5);
        // $categories->appends(request()->all());
        return view('admin.category.list',compact('categories'));
    }

    // direct category create page
    public function createPage(){
        return view('admin.category.create');
    }
    // create category
    public function create(Request $request){
        $this->bloodGroupValidationCheck($request);
        $data=$this->requestbloodGroupData($request);
        Blood_Group::create($data);
        return redirect()->route('category#list');
    }
    // delete blood group
    public function delete($id){
        Blood_Group::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Blood Group Deleted...']);
    }
    // edit blood group
    public function edit($id){
        $category=Blood_Group::where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
    }
    // update blood group
    public function update(Request $request){
        // dd($request->bloodId);
        $this->bloodGroupValidationCheck($request);
        $data=$this->requestbloodGroupData($request);
        Blood_Group::where('id',$request->bloodId)->update($data);
        return redirect()->route('category#list');
    }
    // validation for creation of blood types
    private function bloodGroupValidationCheck($request){
        Validator::make($request->all(),[
            'bloodType' => 'required|unique:blood__groups,blood_type,'.$request->bloodId
        ])->validate();
    }
    // request blood group data
    private function requestbloodGroupData($request){
        return [
            'blood_type' => $request->bloodType
        ];
    }
}
