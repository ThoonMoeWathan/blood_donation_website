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
                                <h2 class="title-1">Blood Inventories</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('bloodInventory#createPage') }}">
                                <button class="btn btn-sm btn-danger btn-block">
                                    <i class="zmdi zmdi-plus"></i> Add Blood Inventory
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
                            <h4> <i class="fa-solid fa-building"></i> ( {{ $inventories->total() }} ) </h4>
                        </div>
                    </div>
                    @if (count($inventories) != 0)
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Blood inventories</th>
                                        <th>Blood Group</th>
                                        <th>Collection Date</th>
                                        <th>Expiry Date</th>
                                        <th>Temperature</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Test Result</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventories as $inv)
                                        <tr class="tr-shadow">
                                            <td> {{ $inv->id }} </td>
                                            <td> {{ $inv->bank_name }} </td>
                                            <td> {{ $inv->blood_type }} </td>
                                            <td> {{ $inv->collection_date }} </td>
                                            <td> {{ $inv->expiry_date }} </td>
                                            <td> {{ $inv->temperature }} &deg;C</td>
                                            <td> {{ $inv->quantity }} Bags</td>
                                            <td> {{ $inv->status }} </td>
                                            <td> {{ $inv->test_result }} </td>
                                            <td>
                                                <div class="table-data-feature">
                                                    {{-- <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="View">
                                                        <i class="zmdi zmdi-eye"></i>
                                                    </button> --}}
                                                    <a href="{{ route('bloodInventory#edit',$inv->id) }}">
                                                    <button class="item me-1" data-toggle="tooltip" data-placement="top"
                                                        title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button></a>
                                                    <a href="{{ route('bloodInventory#delete', $inv->id) }}">
                                                        <button class="item mx-1" data-toggle="tooltip" data-placement="top"
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
                                {{-- {{ $inventories->link() }} --}}
                                {{ $inventories->appends(request()->query())->links() }}
                            </div>
                        </div>
                    @else
                        <h3 class="text-secondary text-center mt-5">There is no Blood Inventory Registered yet.</h3>
                    @endif
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
