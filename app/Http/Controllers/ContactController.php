<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    // direct contact list page
    public function contactList(){
        $contact=Contact::select('contacts.*','users.name as name')
        ->when(request('key'),function($query){
            $query->orWhere('id','like','%'.request('key').'%')
                  ->orWhere('name','like','%'.request('key').'%')
                  ->orWhere('email','like','%'.request('key').'%');
        })
        ->leftJoin('users','users.id','contacts.user_id')
        ->orderBy('created_at','desc')->paginate(5);
        return view('admin.contact.contactList',compact('contact'));
    }
    public function contactDelete($id){
        Contact::where('id',$id)->delete();
        return redirect()->route('admin#contactList')->with(['deleteSuccess'=>'Contact has been successfully Deleted']);
    }
    // contact form page
    public function contactPage(){
        return view('user.contact.contact');
    }
    // contact form
    public function contact(Request $request){
        $this->contactValidationCheck($request);
        $data = $this->getContactData($request);
        Contact::create($data);
        return back()-> with(['contactSuccess'=>'Thank you for contacting us. We will reply you with email after checking your message.']);
    }

    // contact validation check
    private function contactValidationCheck($request){
        Validator::make($request->all(),[
            'email'=>'required',
            'message'=>'required|min:5'
        ])->validate();
    }

    // get contact data
    private function getContactData($request){
        return [
            'user_id' => $request->userId,
            'email' => $request->email,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ];
    }
}
