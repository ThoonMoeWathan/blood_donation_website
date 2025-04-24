@extends('user.layouts.master')

@section('title', 'Login Page')

@section('css-links')
    <!-- Fontfaces CSS-->
    <link href="{{ asset('admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('admin/css/theme.css') }}" rel="stylesheet" media="all">
@endsection
@section('content')

    <body>

        <body class="animsition">
            <div class="page-wrapper register-page-wrapper">
                <div class="page-content--bge5">
                    <div class="container">
                        <div class="login-wrap">
                            <div class="login-content">
                                <div class="login-logo">
                                    <h1 class="text-danger">Book for Appointment</h1>
                                </div>
                                <div class="login-form">
                                    <form action="{{ route('appointment#create') }}" method="post" novalidate="novalidate"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <input name="userId" type="hidden" value="{{ Auth::user()->id }}">
                                        @if (session('registerSuccess'))
                                            <div class="col-12 p-0">
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <i class="fa-solid fa-check me-2"></i> {{ session('registerSuccess') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label class="control-label mb-1">Choose clinic/hospital near your
                                                location</label>
                                            <select name="bloodBank" id=""
                                                class="form-control @error('bloodBank') is-invalid @enderror">
                                                <option value="">Blood Bank</option>
                                                @foreach ($bloodBank as $b)
                                                    <option value="{{ $b->id }}"> {{ $b->bank_name }} </option>
                                                @endforeach
                                            </select>
                                            @error('bloodBank')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Doctor</label>
                                            <select name="doctorName" id=""
                                                class="form-control @error('doctorName') is-invalid @enderror">
                                                <option value="">Choose Doctor for Appointment</option>
                                                @foreach ($doctor as $d)
                                                    <option value="{{ $d->id }}"> {{ $d->doctor_name }} </option>
                                                @endforeach
                                            </select>
                                            @error('doctorName')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Phone</label>
                                            <input id="cc-pament" name="phone" type="number" value="{{ old('phone') }}"
                                                type="number" value="{{ old('phone') }}"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false"
                                                placeholder="Enter phone number to contact you...">
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Choose Date for Appointment</label>
                                            <input id="cc-pament" name="date" type="date" value="{{ old('date') }}"
                                                class="form-control @error('date') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false"
                                                placeholder="Choose date you wished to book...">
                                            @error('date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Choose Time for Appointment</label>
                                            <input id="cc-pament" name="time" type="time"
                                                value="{{ old('time') }}"
                                                class="form-control @error('time') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false"
                                                placeholder="Choose time you wished to book...">
                                            @error('time')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div>
                                            <button id="payment-button" type="submit"
                                                class="btn btn-lg btn-danger btn-block">
                                                <span id="payment-button-amount">Book</span>
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

        </body>
    @endsection
    @section('script-links')
        <!-- Jquery JS-->
        <script src="{{ asset('admin/vendor/jquery-3.2.1.min.js') }}"></script>
        <!-- Bootstrap JS-->
        <script src="{{ asset('admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
        <!-- Vendor JS       -->
        <script src="{{ asset('admin/vendor/slick/slick.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/wow/wow.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/animsition/animsition.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/counter-up/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/select2/select2.min.js') }}"></script>

        <!-- Main JS-->
        <script src="{{ asset('admin/js/main.js') }}"></script>
    @endsection
