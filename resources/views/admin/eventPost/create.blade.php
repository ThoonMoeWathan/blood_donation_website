@extends('admin.layouts.master')

@section('title','Create Blood Group')

@section('content')
    <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3 offset-8">
                                <a href="{{route('category#list')}}"><button class="btn bg-dark text-white my-3">List</button></a>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Add New Event Blog</h3>
                                    </div>
                                    <hr>
                                    <form action="{{route('category#create')}}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <label for="bloodType" class="control-label mb-1">Title</label>
                                            <input id="cc-pament" name="bloodType" type="text" value="{{old('bloodType')}}" class="form-control @error('bloodType') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="AB...">
                                            @error('bloodType')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-4 offset-1">
                                            @if (Auth::user()->image == null)
                                                <img src="{{ asset('image/default_user.png') }}"
                                                    class="img-thumbnail shadow-sm">
                                            @else
                                                <img src="{{ asset('storage/'.Auth::user()->image) }}" class="img-thumbnail shadow-sm"/>
                                            @endif
                                            <div class="mt-3">
                                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" >
                                                @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="mt-3">
                                                <button class="btn bg-dark text-white col-12" type="submit">
                                                    <i class="fa-solid fa-check me-1"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="bloodType" class="control-label mb-1">Post</label>
                                            <input id="cc-pament" name="bloodType" type="text" value="{{old('bloodType')}}" class="form-control @error('bloodType') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="AB...">
                                            @error('bloodType')
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
