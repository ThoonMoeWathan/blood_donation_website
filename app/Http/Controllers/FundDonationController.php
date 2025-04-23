<?php

namespace App\Http\Controllers;

use App\Models\Fund_Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class FundDonationController extends Controller
{
    // diret list page
    public function list(){
        $funds = Fund_Donation::when(request('key'),function($query){
            $query->where('user_name','like','%'. request('key') .'%');
        })
        ->leftJoin('users','users.id','fund__donations.user_id')
        ->select('fund__donations.*', 'users.name as user_name')
        ->orderBy('fund__donations.id','desc')
        ->paginate(5);
        return view('admin.fund.list',compact('funds'));
    }

    // direct payment page
    public function directPage()
    {
        return view('user.payment');
    }

    // make payment
    public function create(Request $request)
    {
        $this->paymentValidationCheck($request);
        $data = $this->requestPaymentData($request);
        Fund_Donation::create($data);
        return redirect()->back()->with(['PaymentSuccess' => 'Thank you for supporting us.']);
    }

    // validation for payment
    private function paymentValidationCheck(Request $request)
    {
        Validator::make($request->all(), [
            'cardNumber' => 'required|digits_between:15,19|numeric',
            'expiryDate' => ['required', 'regex:/^(0[1-9]|1[0-2])\/\d{4}$/'],
            'securityNumber' => 'required|digits_between:3,4|numeric',
            'amount' => 'required|numeric',
        ])->validate();
    }

    // request data for payment
    private function requestPaymentData(Request $request)
    {
        return [
            'user_id' => $request->userId,
            'amount' => $request->amount,
            'created_at' => Carbon::now(),
        ];
    }
}
