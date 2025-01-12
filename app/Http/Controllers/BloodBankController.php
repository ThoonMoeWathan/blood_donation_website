<?php

namespace App\Http\Controllers;

use App\Models\Blood_Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Faker\Core\Blood;

class BloodBankController extends Controller
{
    // diret list page
    public function list(){
        $banks = Blood_Bank::when(request('key'),function($query){
            $query->where('bank_name','like','%'. request('key') .'%');
        })
        ->orderBy('id','desc')
        ->paginate(5);
        // $banks->appends(request()->all());
        return view('admin.bloodBank.list',compact('banks'));
    }

    // direct blood bank create page
    public function createPage(){
        return view('admin.bloodBank.create');
    }
    // create blood bank
    public function create(Request $request){
        // dd($request)

        $this->bloodBankValidationCheck($request);
        $data=$this->requestbloodBankData($request);
        Blood_Bank::create($data);
        return redirect()->route('bloodBank#list');
    }
    // delete blood bank
    public function delete($id){
        Blood_Bank::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Blood Bank Deleted...']);
    }
    // edit blood bank
    public function edit($id){
        $bank=Blood_Bank::where('id',$id)->first();
        return view('admin.bloodBank.edit',compact('bank'));
    }
    // update blood bank
    public function update(Request $request){
        // dd($request->bankId);
        $this->bloodBankValidationCheck($request);
        $data=$this->requestbloodBankData($request);
        Blood_Bank::where('id',$request->bankId)->update($data);
        return redirect()->route('bloodBank#list');

    }
    // validation for creation of blood types
    private function bloodBankValidationCheck($request){
        $validationRules=[
            'bankName' => 'required|unique:blood__banks,bank_name,'.$request->bankId,
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'openAt' => 'required',
            'closeAt' => 'required',
        ];
        Validator::make($request->all(),$validationRules)->validate();
    }
    // request blood bank data
    private function requestbloodBankData($request){
        return [
            'bank_name' => $request->bankName,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'open_at' => $request->openAt,
            'close_at' => $request->closeAt,
        ];
    }
}
