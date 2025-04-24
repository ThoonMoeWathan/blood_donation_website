@extends('admin.layouts.master')

@section('title','Create Blood Group')

@section('content')
    <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3 offset-8">
                                <a href="{{route('doctor#list')}}"><button class="btn bg-dark text-white my-3">List</button></a>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Add New Doctor</h3>
                                    </div>
                                    <hr>
                                    <form action="{{route('doctor#create')}}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <label for="doctorName" class="control-label mb-1">Doctor Name</label>
                                            <input id="cc-pament" name="doctorName" type="text" value="{{old('doctorName')}}" class="form-control @error('doctorName') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Dr. John...">
                                            @error('doctorName')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="degree" class="control-label mb-1">Degree</label>
                                            <input id="cc-pament" name="degree" type="text" value="{{old('degree')}}" class="form-control @error('degree') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Bachelor of Medicine...">
                                            @error('degree')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="control-label mb-1">Email</label>
                                            <input id="cc-pament" name="email" type="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="john@gmail.com...">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="control-label mb-1">Phone Number</label>
                                            <input id="cc-pament" name="phone" type="number" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="09...">
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-danger btn-block">
                                                <span id="payment-button-amount">Create</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
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
