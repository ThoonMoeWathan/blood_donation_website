@extends('user.layouts.master')

@section('title','Login Page')

@section('css-links')
    <!-- Fontfaces CSS-->
    <link href="{{asset('admin/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('admin/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('admin/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('admin/css/theme.css')}}" rel="stylesheet" media="all">
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
                            <h1 class="text-danger">Donor Registeration</h1>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('donor#create') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf

                                            <input name="userId" type="hidden" value="{{Auth::user()->id}}">
                                        @if (session('registerSuccess'))
                                <div class="col-12">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="fa-solid fa-check me-2"></i> {{ session('registerSuccess') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                                        <div class="form-group">
                                            <label class="control-label mb-1">First Name</label>
                                            <input id="cc-pament" name="firstName" type="text" value="{{old('firstName')}}" class="form-control @error('firstName') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter First Name...">
                                            @error('firstName')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Last Name</label>
                                            <input id="cc-pament" name="lastName" type="text" value="{{old('lastName')}}" class="form-control @error('lastName') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Last Name...">
                                            @error('lastName')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Blood Group</label>
                                            <select name="bloodGroup" id="" class="form-control @error('bloodGroup') is-invalid @enderror">
                                                <option value="">Choose Your Blood Type</option>
                                                @foreach ($bloodgp as $b)
                                                    <option value="{{ $b->id }}"> {{ $b->blood_type }} </option>
                                                @endforeach
                                            </select>
                                            @error('bloodGroup')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Date of Birth</label>
                                            <input id="cc-pament" name="dob" type="date" value="{{old('dob')}}" class="form-control @error('dob') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Last Donated Blood...">
                                            @error('dob')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Weight (Including g/lb)</label>
                                            <input id="cc-pament" name="weight" type="text" value="{{old('weight')}}" class="form-control @error('weight') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Current Body Weight...">
                                            @error('weight')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Allergy</label>
                                            <input id="cc-pament" name="allergy" type="text" value="{{old('allergy')}}" class="form-control @error('allergy') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Allergy that you have...">
                                            @error('allergy')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Disease</label>
                                            <input id="cc-pament" name="disease" type="text" value="{{old('disease')}}" class="form-control @error('disease') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Medical conditions that you have...">
                                            @error('disease')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Last Donated Date</label>
                                            <input id="cc-pament" name="lastDonatedBlood" type="date" value="{{old('lastDonatedBlood')}}" class="form-control @error('lastDonatedBlood') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Last Donated Blood...">
                                            @error('lastDonatedBlood')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>


                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-danger btn-block">
                                                <span id="payment-button-amount">Create</span>
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
    <script src="{{asset('admin/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('admin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('admin/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('admin/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('admin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('admin/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('admin/js/main.js')}}"></script>
@endsection
