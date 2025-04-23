<?php

namespace App\Http\Controllers;

use Storage;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Blood_Group;
use App\Models\Blood_Donor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BloodDonorController extends Controller
{
    // user home page
    public function home(){
        return view('user.home');
    }

    // donor register
    public function createPage(){
        $bloodgp= Blood_Group::select('id','blood_type')->get();
        return view('user.donor',compact('bloodgp'));
    }
    // create donor
    public function create(Request $request){
        $this->donorValidationCheck($request,'create');
        $data=$this->requestDonorInfo($request);

        Blood_Donor::create($data);
        return back()-> with(['registerSuccess'=>'Thank you for joining our charity']);
    }

    // request donor info
    private function requestDonorInfo($request){
        return[
            'blood_id' => $request->bloodGroup,
            'user_id'=>$request->userId,
            'dob' => $request->dob,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'weight' => $request->weight,
            'allergy' => $request->allergy,
            'disease' => $request->disease,
            'last_donated_date'=>$request->lastDonatedBlood
        ];
    }
    // donor validation check
    private function donorValidationCheck($request,$action){
        $validationRules=[
            'bloodGroup' => 'required',
            'dob' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'weight' => 'required'
        ];
        Validator::make($request->all(),$validationRules)->validate();
    }
    // ---------------
    // direct admin details page
    public function details(){
        return view('user.account.details');
    }
    // direct admin profile pic
    public function edit(){
        return view('user.account.edit');
    }
    // update account
    public function update($id,Request $request){
        $this->accountValidationCheck($request);
        $data = $this->getUserData($request);

        // for image
        if($request->hasFile('image')){
            // 1. old image name | check => delete | store
            $dbImage=User::where('id',$id)->first();
            $dbImage=$dbImage->image;

            if($dbImage!=null){
                Storage::delete('public/'.$dbImage);
            }
            $fileName=uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image']=$fileName;
        }

        User::where('id',$id)->update($data);
        return redirect()->route('user#details')->with(['updateSuccess'=>'User account has been updated.']);
    }

    // change password page
    public function changePasswordPage(){
        return view('user.account.changePassword');
    }

    // change password
    public function changePassword(Request $request){
        $this->passwordValidationCheck($request);
        $currentUserId= Auth::user()->id;
        $user = User::select('password')->where('id',$currentUserId)->first();
        $dbHashValue = $user->password;

        if(Hash::check($request->oldPassword,$dbHashValue)){
            $data=[
                'password'=> Hash::make($request->newPassword)
            ];
            User::where('id',Auth::user()->id)->update($data);
            // Auth::logout();
            // return redirect()->route('admin#loginPage');
            return back()-> with(['changeSuccess'=>'Password Changed Success']);
        }
        return back()->with(['notMatch'=> 'The old password does not match. Try again.']);
    }
    // request user data (self)
    private function getUserData($request){
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now()
        ];
    }
    // account validation check
    private function accountValidationCheck($request){
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp|file',
            'address' => 'required'
        ])->validate();
    }
    // password validation check
    private function passwordValidationCheck($request){
        Validator::make($request->all(),[
            'oldPassword'=> 'required|min:6',
            'newPassword'=> 'required|min:6',
            'confirmPassword'=> 'required|min:6|same:newPassword'
        ])->validate();
    }

}
