<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use App\Models\Blood_Donor;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    // direct user list page
    public function userList(){
        $users=User::where('role','user')
        ->paginate(5);
        return view('admin.user.list',compact('users'));
    }

    // donor list
    public function donorList(){
        $donors = Blood_Donor::select('blood__donors.*','blood__groups.blood_type as blood_type')
        ->when(request('key'),function($query){
            $query->where('blood__donors.first_name','like','%'.request('key').'%');
        })
        ->leftJoin('blood__groups','blood__donors.blood_id','blood__groups.id')
        ->orderBy('blood__donors.created_at','desc')
        ->paginate(3);
        $donors->appends(request()->all());
        return view('admin.donor.list',compact('donors'));
    }

    // delete donor
    public function deleteDonor($id){
        Blood_Donor::where('id',$id)->delete();
        return redirect()->route('donor#list')->with(['deleteSuccess'=>'Selected Donor has been successfully Removed']);
    }

    // change user role
    public function userChangeRole(Request $request){
        // logger($request->all());
        $updateSource=[
            'role' => $request->role
        ];
        User::where('id',$request->userId)->update($updateSource);
        // return response()->json($data, 200);
    }

    // delete user
    public function deleteUser($id){
        User::where('id',$id)->delete();
        return redirect()->route('admin#userList')->with(['deleteSuccess'=>'This user has been successfully Deleted']);
    }

}
