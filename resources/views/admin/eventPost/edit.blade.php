@extends('admin.layouts.master')

@section('title','Update Event')

@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3 offset-8">
                    <a href="{{ route('events#list') }}">
                        <button class="btn bg-dark text-white my-3">List</button>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 offset-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Update Event Blog</h3>
                        </div>
                        <hr>

                        <form action="{{ route('events#update', $events->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="eventName" class="control-label mb-1">Title</label>
                                <input name="eventName" type="text" value="{{ old('eventName', $events->event_name) }}"
                                    class="form-control @error('eventName') is-invalid @enderror" placeholder="Title of the event...">
                                @error('eventName')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-8 offset-2 text-center">
                                @if ($events->image)
                                    <img src="{{ asset('storage/' . $events->image) }}" class="img-thumbnail shadow-sm my-3" width="200px" />
                                @else
                                    <img src="{{ asset('storage/default_image.jpg') }}" class="img-thumbnail shadow-sm my-3" width="200px" />
                                @endif
                                <div class="mt-2">
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="description" class="control-label mb-1">Post</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Description...">{{ old('description', $events->description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="place" class="control-label mb-1">Place</label>
                                <input name="place" type="text" value="{{ old('place', $events->place) }}"
                                    class="form-control @error('place') is-invalid @enderror" placeholder="Place...">
                                @error('place')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="date" class="control-label mb-1">Date</label>
                                <input name="date" type="date" value="{{ old('date', $events->date) }}"
                                    class="form-control @error('date') is-invalid @enderror">
                                @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="time" class="control-label mb-1">Time</label>
                                <input name="time" type="time" value="{{ old('time', $events->time) }}"
                                    class="form-control @error('time') is-invalid @enderror">
                                @error('time')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-lg btn-danger btn-block">
                                    <span>Update</span>
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
