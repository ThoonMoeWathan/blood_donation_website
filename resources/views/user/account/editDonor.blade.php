@extends('user.layouts.master')

@section('title', 'Update Donor Info')

@section('css-links')
    {{-- same CSS section as before --}}
    @parent
@endsection

@section('content')
<body class="animsition">
    <div class="page-wrapper register-page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <h1 class="text-primary">Update Donor Info</h1>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('donor#update', $donor->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input name="userId" type="hidden" value="{{ $donor->user_id }}">

                                {{-- Success & error messages --}}
                                @if (session('updateSuccess'))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <i class="fa-solid fa-check me-2"></i> {{ session('updateSuccess') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                {{-- First Name --}}
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input name="firstName" type="text" value="{{ old('firstName', $donor->first_name) }}"
                                           class="form-control @error('firstName') is-invalid @enderror"
                                           placeholder="Enter First Name...">
                                    @error('firstName')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Last Name --}}
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input name="lastName" type="text" value="{{ old('lastName', $donor->last_name) }}"
                                           class="form-control @error('lastName') is-invalid @enderror"
                                           placeholder="Enter Last Name...">
                                    @error('lastName')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Blood Group --}}
                                <div class="form-group">
                                    <label>Blood Group</label>
                                    <select name="bloodGroup" class="form-control @error('bloodGroup') is-invalid @enderror">
                                        <option value="">Choose Your Blood Type</option>
                                        @foreach ($bloodGroups as $bg)
                                            <option value="{{ $bg->id }}" {{ $donor->blood_id == $bg->id ? 'selected' : '' }}>
                                                {{ $bg->blood_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('bloodGroup')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Date of Birth --}}
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input name="dob" type="date" value="{{ old('dob', $donor->dob) }}"
                                           class="form-control @error('dob') is-invalid @enderror">
                                    @error('dob')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Weight --}}
                                <div class="form-group">
                                    <label>Weight</label>
                                    <input name="weight" type="text" value="{{ old('weight', $donor->weight) }}"
                                           class="form-control @error('weight') is-invalid @enderror"
                                           placeholder="Current Body Weight...">
                                    @error('weight')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Allergy --}}
                                <div class="form-group">
                                    <label>Allergy</label>
                                    <input name="allergy" type="text" value="{{ old('allergy', $donor->allergy) }}"
                                           class="form-control @error('allergy') is-invalid @enderror"
                                           placeholder="Allergy that you have...">
                                    @error('allergy')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Disease --}}
                                <div class="form-group">
                                    <label>Disease</label>
                                    <input name="disease" type="text" value="{{ old('disease', $donor->disease) }}"
                                           class="form-control @error('disease') is-invalid @enderror"
                                           placeholder="Medical conditions that you have...">
                                    @error('disease')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Last Donated Blood --}}
                                <div class="form-group">
                                    <label>Last Donated Date</label>
                                    <input name="lastDonatedBlood" type="date" value="{{ old('lastDonatedBlood', $donor->last_donated_date) }}"
                                           class="form-control @error('lastDonatedBlood') is-invalid @enderror">
                                    @error('lastDonatedBlood')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Submit --}}
                                <div>
                                    <button type="submit" class="btn btn-lg btn-primary btn-block">
                                        <span>Update</span>
                                        <i class="fa-solid fa-circle-check ms-1"></i>
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
    {{-- same script section as before --}}
    @parent
@endsection
