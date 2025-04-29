@extends('user.layouts.master')

@section('title', 'Admin Account Detail')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content mb-5 pb-5 pt-3">
        <div class="col-4 offset-6 mb-2">
            @if (session('updateSuccess'))
                <div class="">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-check"></i> {{ session('updateSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>

        <div class="section__content section__content--p30">
            <div class="container-fluid">
                {{-- <div class="row">
                    <div class="col-3 offset-8">
                        <a href="{{ route('category#list') }}"><button class="btn bg-dark text-white my-3">List</button></a>
                    </div>
                </div> --}}
                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body m-0 p-0">
                            <div class="card-title py-3">
                                <h3 class="text-center title-2">Your Account Info</h3>
                            </div>
                            <div class="row">
                                <div class="col-4 offset-2">
                                    @if (Auth::user()->image == null)
                                        <img src="{{ asset('image/default_user.png') }}" class="img-thumbnail shadow-sm">
                                    @else
                                        <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                            class="img-thumbnail shadow-sm profile-image" />
                                    @endif
                                </div>
                                <div class="col-6">
                                    <h4 class="my-3"><i class="fa-solid fa-user-pen me-2"></i> {{ Auth::user()->name }}
                                    </h4>
                                    <h4 class="my-3"><i class="fa-regular fa-envelope me-2"></i> {{ Auth::user()->email }}
                                    </h4>
                                    <h4 class="my-3"><i class="fa-solid fa-phone me-2"></i> {{ Auth::user()->phone }}</h4>
                                    <h4 class="my-3"><i class="fa-solid fa-location-dot me-2"></i>
                                        {{ Auth::user()->address }}</h4>
                                    <h4 class="my-3"><i class="fa-solid fa-user-clock me-2"></i>
                                        {{ Auth::user()->created_at->format('j F Y') }}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 offset-2 mt-3">
                                    <a href="{{ route('user#edit') }}">
                                        <button class="btn bg-dark text-white">
                                            <i class="fa-solid fa-pen-to-square me-2"></i> Edit Profile
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- user health condition --}}
                        @if ($donors->isNotEmpty())
                            @foreach ($donors as $donor)
                            <hr>
                            <div class="card-title py-3">
                                <h3 class="text-center title-2">Your Health Info</h3>
                            </div>
                                <div class="row">
                                    <div class="offset-2 col-4">
                                        <h4 class="my-3"><i class="fa-solid fa-user-pen me-2"></i> First Name:
                                            {{ $donor->first_name }}</h4>
                                        <h4 class="my-3"><i class="fa-solid fa-weight-scale me-2"></i> Weight:
                                            {{ $donor->weight }} kg</h4>
                                        <h4 class="my-3"><i class="fa-regular fa-envelope me-2"></i> Date of Birth:
                                            {{ $donor->dob }}
                                        </h4>
                                        <h4 class="my-3"><i class="fa-solid fa-tint me-2"></i> Blood Type:
                                            {{ $donor->blood_type }}
                                        </h4>
                                    </div>
                                    <div class="col-6">
                                        <h4 class="my-3"><i class="fa-solid fa-user-pen me-2"></i> Last Name:
                                            {{ $donor->last_name }}</h4>

                                        <h4 class="my-3"><i class="fa-solid fa-allergies me-2"></i> Allergy:
                                            {{ $donor->allergy ?? 'No Allergy' }}</h4>
                                        <h4 class="my-3"><i class="fa-solid fa-virus me-2"></i> Disease:
                                            {{ $donor->disease ?? 'No Disease' }}</h4>
                                        <h4 class="my-3"><i class="fa-solid fa-hand-holding-medical me-2"></i> Last
                                            Donated Date:
                                            {{ $donor->last_donated_date ?? 'Not Donated Before' }}</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 offset-2 my-3">
                                        <a href="{{ route('donor#edit', $donor->id) }}">
                                            <button class="btn bg-dark text-white">
                                                <i class="fa-solid fa-pen-to-square me-2"></i> Edit Donor
                                            </button>
                                        </a>
                                    </div>
                                </div>

                    @endforeach
                </div>
                @else
                <hr>
                    <div class="row">
                        <div class="col-10 offset-1">
                            <p class="text-center text-muted mb-3">There is no health condition information to display.
                                Please register as a donor first.</p>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
