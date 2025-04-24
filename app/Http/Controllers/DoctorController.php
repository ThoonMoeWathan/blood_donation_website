<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    // diret list page
    public function list(){
        $doctors = Doctor::when(request('key'),function($query){
            $query->where('doctor_name','like','%'. request('key') .'%');
        })
        ->orderBy('id','desc')
        ->paginate(5);
        // $categories->appends(request()->all());
        return view('admin.doctor.list',compact('doctors'));
    }

    // direct category create page
    public function createPage(){
        return view('admin.doctor.create');
    }
    // create category
    public function create(Request $request){
        // dd($request);
        $this->doctorValidationCheck($request);
        $data=$this->requestDoctorData($request);
        // dd($data);
        Doctor::create($data);
        return redirect()->route('doctor#list');
    }
    // delete blood group
    public function delete($id){
        Doctor::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Selected Doctor has been Deleted.']);
    }
    // edit blood group
    public function edit($id){
        $doctor=Doctor::where('id',$id)->first();
        return view('admin.doctor.edit',compact('doctor'));
    }
    // update blood group
    public function update(Request $request){
        // dd($request->doctorId);
        $this->doctorValidationCheck($request);
        $data=$this->requestDoctorData($request);
        Doctor::where('id',$request->doctorId)->update($data);
        return redirect()->route('doctor#list');
    }
    // validation for creation of blood types
    private function doctorValidationCheck($request){
        Validator::make($request->all(),[
            'doctorName' => 'required|unique:doctors,doctor_name,'.$request->doctorId,
            'degree'=>'required',
            'email'=>'required',
            'phone'=>'required|min:11'
        ])->validate();
    }
    // request blood group data
    private function requestDoctorData($request){
        return [
            'doctor_name' => $request->doctorName,
            'degree' => $request->degree,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => Carbon::now()
        ];
    }
}
