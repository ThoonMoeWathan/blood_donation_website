@extends('admin.layouts.master')

@section('title', 'Category List')

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
                                <h2 class="title-1">Donor List</h2>

                            </div>
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
                        <form action="{{route('donor#list')}}" method="get">
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
                        <div class="col-2 offset-10 text-primary p-2 text-right text-danger">
                            <h4> <i class="fa-solid fa-user mr-2 "></i>( {{$donors->total()}} ) </h4>
                        </div>
                    </div>
                        @if (count($donors)!=0)
                            <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Date of Birth</th>
                                        <th>Blood Type</th>
                                        <th>Weight</th>
                                        <th>Allergy</th>
                                        <th>Disease</th>
                                        <th>Last Donated Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donors as $d)
                                        <tr class="tr-shadow">
                                            <td> {{$d->first_name}} </td>
                                            <td> {{$d->last_name}} </td>
                                            <td> {{$d->dob}} </td>
                                            <td> {{$d->blood_type}} </td>
                                            <td> {{$d->weight}} </td>
                                            <td> {{$d->allergy ?: 'No Allergy'}} </td>
                                            <td> {{$d->disease ?: 'No Disease'}} </td>
                                            <td> {{$d->last_donated_date ?: 'Not Donated Before'}} </td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="{{ route('donor#delete',$d->id) }}">
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
                                {{ $donors->links() }}
                            </div>
                        </div>
                        @else
                            <h3 class="text-secondary text-center mt-5">There is no blood donor registered yet.</h3>
                        @endif
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
