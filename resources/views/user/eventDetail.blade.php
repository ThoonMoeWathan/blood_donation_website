@extends('user.layouts.master')
@section('title', 'Home Page')
@section('content')

    <body>
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-12">
                    <div class="card shadow-sm p-4">
                        <h1 class="mb-3">{{ $eventDetail->event_name }}</h1>
                        <p class="text-muted mb-1">{{ \Carbon\Carbon::parse($eventDetail->date)->format('d F Y') }}</p>
                        @if ($eventDetail->image !== null)
                            <img src="{{ asset("storage/$eventDetail->image") }}" class="img-fluid rounded my-3"
                                alt="Event Image">
                        @endif
                        <p class="mb-2"><strong>Time:</strong> {{ $eventDetail->time }}</p>
                        <p class="mb-2"><strong>Place:</strong> {{ $eventDetail->place }}</p>
                        <p class="mb-4">{{ $eventDetail->description }}</p>

                        <!-- Share and Tags -->
                        <div class="d-flex flex-wrap justify-content-between align-items-center border-top pt-3">
                            <div class="mb-2">
                                <h5>Share it</h5>
                                <a href="#" class="btn btn-outline-primary btn-sm me-1"><i
                                        class="bi bi-facebook"></i></a>
                                <a href="#" class="btn btn-outline-info btn-sm me-1"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="btn btn-outline-danger btn-sm me-1"><i
                                        class="bi bi-google"></i></a>
                                <a href="#" class="btn btn-outline-danger btn-sm me-1"><i
                                        class="bi bi-pinterest"></i></a>
                                <a href="#" class="btn btn-outline-primary btn-sm"><i class="bi bi-linkedin"></i></a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bootstrap Icons CDN --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </body>
@endsection
