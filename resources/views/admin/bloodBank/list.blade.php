@extends('admin.layouts.master')

@section('title','Admin Dashboard')

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
                                <h2 class="title-1">Blood Banks (Clinics and Hospitals)</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('bloodBank#createPage') }}">
                                <button class="btn btn-sm btn-danger btn-block">
                                    <i class="zmdi zmdi-plus"></i> Add Blood Bank
                                </button>
                            </a>
                        </div>
                    </div>
                    @if (session('deleteSuccess'))
                        <div class="col-6 offset-6">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fa-solid fa-check"></i>  {{session('deleteSuccess')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-3">
                            <h4 class="text-secondary">Search key : <span class="text-success">{{request('key')}}</span> </h4>
                        </div>
                    <div class="col-3 offset-9">
                        <form action="{{route('category#list')}}" method="get">
                            @csrf
                            <div class="d-flex">
                                <input type="text" name="key" id="" class="form-control" placeholder="Search..." value="{{ request('key') }}">
                            <button class="btn bg-dark text-white" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            </div>
                        </form>
                    </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-2 offset-10 text-danger p-2 text-right">
                            <h4> <i class="fa-solid fa-building"></i> ( {{ $banks->total() }} ) </h4>
                        </div>
                    </div>
                    @if (count($banks) != 0)
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Blood Banks</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Address</th>
                                        <th>Open At</th>
                                        <th>Close At</th>
                                        <th>Created At</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banks as $bloodBank)
                                        <tr class="tr-shadow">
                                            <td> {{ $bloodBank->id }} </td>
                                            <td> {{ $bloodBank->bank_name }} </td>
                                            <td> {{ $bloodBank->state }} </td>
                                            <td> {{ $bloodBank->city }} </td>
                                            <td> {{ $bloodBank->address }} </td>
                                            <td> {{ $bloodBank->open_at }} </td>
                                            <td> {{ $bloodBank->close_at }} </td>
                                            <td> {{ $bloodBank->created_at->format('j-F-Y') }} </td>
                                            <td>
                                                <div class="table-data-feature">
                                                    {{-- <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="View">
                                                        <i class="zmdi zmdi-eye"></i>
                                                    </button> --}}
                                                    <a href="{{ route('bloodBank#edit',$bloodBank->id) }}">
                                                    <button class="item me-1" data-toggle="tooltip" data-placement="top"
                                                        title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button></a>
                                                    <a href="{{ route('bloodBank#delete', $bloodBank->id) }}">
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
                                {{-- {{ $banks->link() }} --}}
                                {{ $banks->appends(request()->query())->links() }}
                            </div>
                        </div>
                    @else
                        <h3 class="text-secondary text-center mt-5">There is no Blood Type Registered yet.</h3>
                    @endif
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
