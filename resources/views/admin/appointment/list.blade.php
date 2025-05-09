@extends('admin.layouts.master')

@section('title', 'Appointment List')

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
                                <h2 class="title-1">Appointment Lists</h2>

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
                        <form action="{{route('admin#appointmentList')}}" method="get">
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
                            <h4> <i class="fa-solid fa-calendar-check mr-2"></i>( {{$appointments->total()}} )</h4>
                        </div>
                    </div>
                        @if (count($appointments)!=0)
                            <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Blood Bank</th>
                                        <th>Doctor</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Created At</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $p)
                                        <tr class="tr-shadow">
                                            <td class="" id="appointmentId"> {{$p->id}} </td>
                                            <td class="col-1"> {{$p->user_name}} </td>
                                            <td class="col-1"> {{$p->bank_name}} </td>
                                            <td class="col-1"> {{$p->doctor_name}} </td>
                                            <td class="col-1"> {{$p->phone}} </td>
                                            <td class="col-1"> {{$p->date}} </td>
                                            <td class="col-1"> {{$p->time}} </td>
                                            <td class="col-2"> {{$p->created_at}} </td>
                                            <td class="col-3">
                                                <select name="status" class="form-control appointmentStatusChange">
                                                    <option value="0" @if ($p->status == 0) selected @endif>
                                                        Pending</option>
                                                    <option value="1" @if ($p->status == 1) selected @endif>
                                                        Accept</option>
                                                    <option value="2" @if ($p->status == 2) selected @endif>
                                                        Reject</option>
                                                </select>
                                                </td>
                                            <td class="col-1">
                                                <div class="table-data-feature">
                                                    <a href="{{ route('admin#appointmentDelete',$p->id) }}">
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
                                {{ $appointments->links() }}
                            </div>
                        </div>
                        @else
                            <h3 class="text-secondary text-center mt-5">There is no Appointment here.</h3>
                        @endif
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
