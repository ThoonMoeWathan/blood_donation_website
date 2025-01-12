@extends('admin.layouts.master')

@section('title','Edit Blood Group')

@section('content')
    <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3 offset-8">
                                <a href="{{ route('bloodBank#list') }}"><button class="btn bg-dark text-white my-3">List</button></a>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Edit Blood Bank</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('bloodBank#update') }}" method="post" novalidate="novalidate">
                                        @csrf
                                        <input type="hidden" name="bankId" value="{{$bank->id}}">
                                        <div class="form-group">
                                            <label for="bankName" class="control-label mb-1">Bank Name</label>
                                            <input id="cc-pament" name="bankName" type="text" value="{{old('bankName',$bank->bank_name)}}" class="form-control @error('bankName') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Blood Bank Name">
                                            @error('bankName')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="state" class="control-label mb-1">State</label>
                                            <input id="cc-pament" name="state" type="text" value="{{old('state',$bank->state)}}" class="form-control @error('state') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Location State of the Bank">
                                            @error('state')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class="control-label mb-1">City</label>
                                            <input id="cc-pament" name="city" type="text" value="{{old('city',$bank->city)}}" class="form-control @error('city') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter City of the Bank">
                                            @error('city')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="control-label mb-1">Address</label>
                                            <input id="cc-pament" name="address" type="text" value="{{old('address',$bank->address)}}" class="form-control @error('address') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Location Address of the Bank">
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="openAt" class="control-label mb-1">Open At</label>
                                            <input id="cc-pament" name="openAt" type="time" value="{{old('openAt',$bank->open_at)}}" class="form-control @error('openAt') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="When is this Blood Bank usually open?">
                                            @error('openAt')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="closeAt" class="control-label mb-1">Close At</label>
                                            <input id="cc-pament" name="closeAt" type="time" value="{{old('closeAt',$bank->close_at)}}" class="form-control @error('closeAt') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="When is this Blood Bank usually close?">
                                            @error('closeAt')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-danger btn-block">
                                                <span id="payment-button-amount">Update</span>
                                                {{-- <span id="payment-button-sending" style="display:none;">Sending…</span> --}}
                                                <i class="fa-solid fa-circle-right"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
@endsection
