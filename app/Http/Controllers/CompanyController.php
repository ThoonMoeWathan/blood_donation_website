<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes;


class CompanyController extends Controller
{
    // diret list page
    public function list(){
        $companies = Company::when(request('key'),function($query){
            $query->where('company_name','like','%'. request('key') .'%');
        })
        ->leftJoin('users','users.id','companies.user_id')
        ->select('companies.*', 'users.name as user_name')
        ->orderBy('companies.id','desc')
        ->paginate(5);
        // $companies->appends(request()->all());
        return view('admin.company.list',compact('companies'));
    }

    // direct company create page
    public function createPage(){
        return view('user.company');
    }
    // create company
    public function create(Request $request){
        $this->companyValidationCheck($request);
        $data=$this->requestCompanyData($request);
        Company::create($data);
        return back()-> with(['companySuccess'=>'Company Account has been successfully created.']);
        // return redirect()->route('company#list');
    }
    // delete company
    public function delete($id){
        Company::where('id', $id)->delete();
        return back()->with(['deleteSuccess'=>'Company Deleted...']);   
    }

    // validation for creation of company
    private function companyValidationCheck($request){
        Validator::make($request->all(),[
            'companyName' => 'required|unique:companies,company_name,'.$request->companyId,
            'companyEmail' => 'required|unique:companies,company_email,'.$request->companyId
        ])->validate();
    }
    // request blood group data
    private function requestCompanyData($request){
        return [
            'user_id' => $request->userId,
            'company_name' => $request->companyName,
            'company_email' => $request->companyEmail,
            'created_at' => Carbon::now()
        ];
    }
}
