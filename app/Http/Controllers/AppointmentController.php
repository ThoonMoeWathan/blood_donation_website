<?php

namespace App\Http\Controllers;

use Faker\Core\Blood;
use App\Models\Doctor;
use App\Models\Blood_Bank;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    // direct contact list page
    public function appointmentList(){
        $appointments=Appointment::select('appointments.*','users.name as user_name','blood__banks.bank_name as bank_name','doctors.doctor_name as doctor_name')
        ->when(request('key'),function($query){
            $query->orWhere('id','like','%'.request('key').'%')
                  ->orWhere('users.name','like','%'.request('key').'%')
                  ->orWhere('email','like','%'.request('key').'%');
        })
        ->leftJoin('users','users.id','appointments.user_id')
        ->leftJoin('blood__banks','appointments.bank_id','blood__banks.id')
        ->leftJoin('doctors','appointments.doctor_id','doctors.id')
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
        $doctor= Doctor::select('id','doctor_name')->get();
        return view('user.booking',compact('bloodBank','doctor'));
    }
    // create donor
    public function create(Request $request){
        $this->appointmentValidationCheck($request,'create');
        $data=$this->requestAppointmentInfo($request);

        Appointment::create($data);
        return back()-> with(['registerSuccess'=>'Appointment Booking Success! Please check status in profile for confirmation.']);
    }

    public function changeStatus(Request $request)
    {
        $request->validate([
            'appointmentId' => 'required|integer',
            'status' => 'required|in:0,1,2',
        ]);

        $appointment = Appointment::find($request->appointmentId);

        if ($appointment) {
            $appointment->status = $request->status;
            $appointment->save();

            return response()->json(['message' => 'Status updated successfully.']);
        } else {
            return response()->json(['message' => 'Request not found.'], 404);
        }
    }

    // ajax change status
    public function ajaxChangeStatus(Request $request){
        Appointment::where('id',$request->appointmentId)->update([
            'status'=>$request->status
        ]);

        $appointment = Appointment::select('appointments.*', 'users.name as user_name')
            ->leftJoin('users','users.id','appointments.user_id')
            ->leftJoin('blood__banks','appointments.bank_id','blood__banks.id')
            ->leftJoin('doctors','appointments.doctor_id','doctors.id')
            ->orderBy('appointments.created_at', 'desc')
            ->get();

        return response()->json($appointment, 200);
    }
    // request donor info
    private function requestAppointmentInfo($request){
        return[
            'bank_id' => $request->bloodBank,
            'doctor_id' => $request->doctorName,
            'user_id'=>$request->userId,
            'phone' => $request->phone,
            'date'=> $request->date,
            'time'=> $request->time,
        ];
    }
    // donor validation check
    private function appointmentValidationCheck($request,$action){
        $validationRules=[
            'bloodBank' => 'required',
            'doctorName'=>'required',
            'phone' => 'required|min:11',
            'date' => 'required',
            'time' => 'required',
        ];
        Validator::make($request->all(),$validationRules)->validate();
    }
}
