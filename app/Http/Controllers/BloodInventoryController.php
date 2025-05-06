<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Blood_Bank;
use App\Models\Blood_Group;
use Illuminate\Http\Request;
use App\Models\Blood_Inventory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BloodInventoryController extends Controller
{
    // direct list page
    public function list(){
        $inventories = Blood_Inventory::when(request('key'),function($query){
            $query->where('blood__groups.blood_type','like','%'. request('key') .'%');
        })
        ->leftJoin('blood__groups','blood__groups.id','blood__inventories.blood_group_id')
        ->leftJoin('blood__banks','blood__banks.id','blood__inventories.bank_id')
        ->select('blood__inventories.*','blood__groups.blood_type as blood_type','blood__banks.bank_name as bank_name')
        ->orderBy('blood__inventories.id','desc')
        ->paginate(5);
        return view('admin.bloodInventory.list',compact('inventories'));
    }
    // direct category create page
    public function createPage(){
        $bloodBank= Blood_Bank::select('id','bank_name')->get();
        $bloodGroup= Blood_Group::select('id','blood_type')->get();
        return view('admin.bloodInventory.create',compact('bloodBank','bloodGroup'));
    }
    // create category
    public function create(Request $request){
        $this->bloodInventoryValidationCheck($request);
        $data=$this->requestBloodInventoryData($request);
        Blood_Inventory::create($data);
        return redirect()->route('bloodInventory#list');
    }
    // direct blood inventory edit page
    public function edit($id){
        $bloodInventory = Blood_Inventory::leftJoin('blood__groups', 'blood__groups.id', 'blood__inventories.blood_group_id')
            ->leftJoin('blood__banks', 'blood__banks.id', 'blood__inventories.bank_id')
            ->select(
                'blood__inventories.*',
                'blood__groups.blood_type as blood_type',
                'blood__banks.bank_name as bank_name'
            )
            ->where('blood__inventories.id', $id)
            ->first();

        $bloodBank = Blood_Bank::select('id', 'bank_name')->get();
        $bloodGroup = Blood_Group::select('id', 'blood_type')->get();

        return view('admin.bloodInventory.edit', compact('bloodInventory', 'bloodBank', 'bloodGroup'));
    }
    // update blood inventory
    public function update(Request $request,   $id){
        $this->bloodInventoryValidationCheck($request);
        $data = $this->requestBloodInventoryData($request);

        Blood_Inventory::where('id', $id)->update($data);

        return redirect()->route('bloodInventory#list');
    }
    // delete blood inventory
    public function delete($id){
        Blood_Inventory::where('id', $id)->delete();
        return redirect()->route('bloodInventory#list')->with(['deleteSuccess'=>'This inventory has been successfully Deleted']);
    }

    // validation for creation of blood inventory
    private function bloodInventoryValidationCheck($request){
        Validator::make($request->all(),[
            'bloodBank' => 'required',
            'bloodGroup' => 'required',
            'collectionDate' => 'required',
            'expiryDate' => 'required',
            'temperature' => 'required',
            'quantity' => 'required',
            'status' => 'required',
            'testResult' => 'required'
        ])->validate();
    }
    // request blood inventory data
    private function requestBloodInventoryData($request){
        return [
            'bank_id' => $request->bloodBank,
            'blood_group_id' => $request->bloodGroup,
            'collection_date' => $request->collectionDate,
            'expiry_date' => $request->expiryDate,
            'temperature' => $request->temperature,
            'quantity' => $request->quantity,
            'status' => $request->status,
            'test_result' => $request->testResult,
            'updated_at' => Carbon::now()
        ];
    }
}
