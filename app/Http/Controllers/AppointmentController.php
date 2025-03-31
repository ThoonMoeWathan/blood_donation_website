<?php

namespace App\Http\Controllers;

use Faker\Core\Blood;
use App\Models\Blood_Bank;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    // direct contact list page
    public function appointmentList(){
        $appointments=Appointment::select('appointments.*','users.name as user_name','blood__banks.bank_name as bank_name')
        ->when(request('key'),function($query){
            $query->orWhere('id','like','%'.request('key').'%')
                  ->orWhere('users.name','like','%'.request('key').'%')
                  ->orWhere('email','like','%'.request('key').'%');
        })
        ->leftJoin('users','users.id','appointments.user_id')
        ->leftJoin('blood__banks','appointments.bank_id','blood__banks.id')
        ->orderBy('appointments.created_at','desc')
        ->paginate(5);
        $appointments->appends(request()->all());
        return view('admin.appointment.list',compact('appointments'));
    }
    public function appointmentDelete($id){
        Appointment::where('id',$id)->delete();
        return redirect()->route('admin#appointmentList')->with(['deleteSuccess'=>'Selected Appointment has been successfully Deleted']);
    }
    // donor register
    public function createPage(){
        // dd(Blood_Donor::select('id',''));
        $bloodBank= Blood_Bank::select('id','bank_name')->get();
        return view('user.booking',compact('bloodBank'));
    }
    // create donor
    public function create(Request $request){
        $this->appointmentValidationCheck($request,'create');
        $data=$this->requestAppointmentInfo($request);

        Appointment::create($data);
        return back()-> with(['registerSuccess'=>'Appointment Booking Success! We will contact you within a week.']);
    }
    // request donor info
    private function requestAppointmentInfo($request){
        return[
            'bank_id' => $request->bloodBank,
            'user_id'=>$request->userId
            // 'phone' => $request->phone
        ];
    }
    // donor validation check
    private function appointmentValidationCheck($request,$action){
        $validationRules=[
            'bloodBank' => 'required',
            // 'phone' => 'required|min:11',
        ];
        Validator::make($request->all(),$validationRules)->validate();
    }
}
