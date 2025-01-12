<?php

namespace App\Http\Controllers;

use App\Models\Blood_Group;
use Illuminate\Http\Request;
use App\Models\Request_Blood;
use Illuminate\Support\Facades\Validator;

class RequestBloodController extends Controller
{
    // request list
    public function list(){
        $bloodRequests = Request_Blood::select('request__bloods.*','users.name as user_name','blood__groups.blood_type as blood_type')
        ->when(request('key'),function($query){
            $query->where('users.name','like','%'.request('key').'%');
        })
        ->leftJoin('users','users.id','request__bloods.user_id')
        ->leftJoin('blood__groups','request__bloods.blood_id','blood__groups.id')
        ->orderBy('request__bloods.created_at','desc')
        ->paginate(3);
        $bloodRequests->appends(request()->all());
        return view('admin.requestBlood.list',compact('bloodRequests'));
    }
    // delete request
    public function delete($id){
        Request_Blood::where('id',$id)->delete();
        return redirect()->route('requestBlood#list')->with(['deleteSuccess'=>'The selected request has been successfully Deleted']);
    }
    // donor register
    public function createPage(){
        $bloodgp= Blood_Group::select('id','blood_type')->get();
        return view('user.requestBlood',compact('bloodgp'));
    }
    // create donor
    public function create(Request $request){
        $this->donorValidationCheck($request,'create');
        $data=$this->requestDonorInfo($request);

        Request_Blood::create($data);
        return back()-> with(['registerSuccess'=>'We will contact you soon.']);
    }

    // request donor info
    private function requestDonorInfo($request){
        return[
            'blood_id' => $request->bloodGroup,
            'user_id'=>$request->userId,
            'require_for' => $request->requireFor,
            'relation' => $request->relation,
            'message' => $request->message
        ];
    }
    // donor validation check
    private function donorValidationCheck($request,$action){
        $validationRules=[
            'bloodGroup' => 'required',
            'requireFor' => 'required',
            'relation' => 'required'
        ];
        Validator::make($request->all(),$validationRules)->validate();
    }
}
