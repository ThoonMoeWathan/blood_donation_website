@extends('admin.layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Manage Event Blog Posts</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('events#createPage') }}">
                                <button class="btn btn-sm btn-danger btn-block">
                                    <i class="zmdi zmdi-plus"></i> Add New Post
                                </button>
                            </a>
                        </div>
                    </div>
                    @if (session('deleteSuccess'))
                        <div class="col-6 offset-6">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-check"></i> {{ session('deleteSuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-3">
                            <h4 class="text-secondary">Search key : <span class="text-success">{{ request('key') }}</span>
                            </h4>
                        </div>
                        <div class="col-3 offset-9">
                            <form action="{{ route('events#list') }}" method="get">
                                @csrf
                                <div class="d-flex">
                                    <input type="text" name="key" id="" class="form-control"
                                        placeholder="Search..." value="{{ request('key') }}">
                                    <button class="btn bg-dark text-white" type="submit">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-2 offset-10 text-danger p-2 text-right">
                            <h4> <i class="fa-solid fa-droplet"></i> ( {{ $events->total() }} ) </h4>
                        </div>
                    </div>
                    @if (count($events) != 0)
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Event Name/th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Place</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                        <tr class="tr-shadow">
                                            <td> {{ $event->id }} </td>
                                            <td class="col-2"> {{ $event->event_name }} </td>
                                            <td class="col-2">
                                                @if ($event->image == null)
                                                    <img src="{{ asset('storage/default_image.jpg') }}" width="60px"
                                                        class="img-thumbnil shadow-sm float-left">
                                                @else
                                                    <img src="{{ asset('storage/' . $event->image) }}" width="150px" />
                                                @endif
                                            </td>

                                            <td>
                                                <div class="scrollable"> {{ $event->description }} </div>
                                            </td>


                                            <td> {{ $event->place }} </td>
                                            <td> {{ $event->date }} </td>
                                            <td> {{ $event->time }} </td>
                                            <td>
                                                <div class="table-data-feature">
                                                    {{-- <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="View">
                                                        <i class="zmdi zmdi-eye"></i>
                                                    </button> --}}
                                                    <a href="{{ route('events#edit',$event->id) }}">
                                                    <button class="item me-1" data-toggle="tooltip" data-placement="top"
                                                        title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button></a>
                                                    <a href="{{ route('events#delete', $event->id) }}">
                                                    <button class="item me-1" data-toggle="tooltip" data-placement="top"
                                                        title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{-- {{ $categories->link() }} --}}
                                {{ $events->appends(request()->query())->links() }}
                            </div>
                        </div>
                    @else
                        <h3 class="text-secondary text-center mt-5">There is no Event Post Registered yet.</h3>
                    @endif
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
