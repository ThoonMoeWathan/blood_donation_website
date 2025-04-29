@extends('admin.layouts.master')

@section('title','Create Blood Group')

@section('content')
    <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3 offset-8">
                                <a href="{{route('events#list')}}"><button class="btn bg-dark text-white my-3">List</button></a>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Add New Event Blog</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('events#create') }}" method="POST" enctype="multipart/form-data">

                                        @csrf
                                        <div class="form-group">
                                            <label for="eventName" class="control-label mb-1">Title</label>
                                            <input id="cc-pament" name="eventName" type="text" value="{{old('eventName')}}" class="form-control @error('eventName') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Title of the event...">
                                            @error('eventName')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 p-0 my-3">


                                                <div class="mt-3">
                                                    <input type="file"  style="width: 100%" class="form-control @error('image') is-invalid @enderror" name="image">
                                                    @error('image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="control-label mb-1">Post</label>
                                            <textarea id="cc-pament" name="description"  value="{{old('description')}}" class="form-control @error('description') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Description..."></textarea>
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="place" class="control-label mb-1">Place</label>
                                            <input id="cc-pament" name="place" type="text" value="{{old('place')}}" class="form-control @error('place') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="AB...">
                                            @error('place')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="date" class="control-label mb-1">Date</label>
                                            <input id="cc-pament" name="date" type="date" value="{{old('date')}}" class="form-control @error('date') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Where it will take place...">
                                            @error('date')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="time" class="control-label mb-1">Time</label>
                                            <input id="cc-pament" name="time" type="time" value="{{old('time')}}" class="form-control @error('time') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Where it will take place...">
                                            @error('time')
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
