@extends('user.layouts.master')

@section('title', 'Status')

@section('content')
    <!-- Cart Start -->
    <div class="container-fluid" style="min-height: 400px overflow-y:scroll;">
        <div class="row px-xl-5 mt-5 mb-5">
            {{-- blood request status --}}
            <div class="col-lg-12 table-responsive mb-5">

                @if (count($bloodRequests)!=0)
                <table class="table table-light table-borderless table-hover mb-0" id="dataTable">
                    <thead class="thead-dark">
                        <thead>
                            <tr>
                                <th scope="col-3">Require For</th>
                                <th scope="col-3">Blood Type</th>
                                <div class="align-middle" scope="col-3">
                                <th class="text-center">Relation</th>
                                </div>
                                <div scope="col-3">
                                    <th class="text-right">Status</th>
                                </div>

                            </tr>
                        </thead>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($bloodRequests as $br)

                            <tr>

                                <td class="align-middle" id=""scope="col-3">{{ $br->require_for }}</td>
                                <td class="align-middle" id=""scope="col-3">{{ $br->blood_type }}</td>
                                <div class="align-middle" id=""scope="col-3">
                                    <td class="text-center" id=""scope="col-3">{{ $br->relation }}</td>
                                </div>

                                <div class="align-middle" id=""scope="col-3">
                                <td id="" class="text-right">
                                    @if ($br->status==0)
                                        <span class="btn btn-sm btn-warning shadow-sm"><i class="zmdi zmdi-time-restore"></i> Pending</span>
                                    @elseif ($br->status==1)
                                        <span class="btn btn-sm btn-success shadow-sm"><i class="zmdi zmdi-check"></i> Success</span>
                                    @elseif ($br->status==2)
                                        <span class="btn btn-sm btn-danger shadow-sm"><i class="zmdi zmdi-alert-triangle"></i> Rejected</span>
                                    @endif
                                </td>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                    @else
                            <p class="text-secondary text-center mt-5">There is no Blood request yet.</p>
                    @endif
                </table>

                <div class="mt-4" >
                    {{$bloodRequests->links()}}
                </div>
            </div>

<div class="col-lg-12"><hr></div>

            {{-- appointment status --}}
            <div class="col-lg-12 table-responsive mb-5">

                @if (count($appointments)!=0)
                <table class="table table-light table-borderless table-hover mb-0" id="dataTable">
                    <thead class="thead-dark">
                        <thead>
                            <tr>
                                <th scope="col">Blood Bank</th>
                                <th scope="col">Doctor Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <div scope="col">
                                    <th class="text-right">Status</th>
                                </div>
                            </tr>
                        </thead>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($appointments as $ap)

                            <tr>

                                <td class="align-middle" id=""scope="col">{{ $ap->bank_name }}</td>
                                <td class="align-middle" id=""scope="col">{{ $ap->doctor_name }}</td>
                                <td class="align-middle" id=""scope="col">{{ $ap->phone }}</td>
                                <td class="align-middle" id=""scope="col">{{ $ap->date }}</td>
                                <td class="align-middle" id=""scope="col">{{ $ap->time }}</td>
                                <div  class="align-middle" id=""scope="col">
                                    <td  class="text-right">
                                        @if ($ap->status==0)
                                            <span class="btn btn-sm btn-warning shadow-sm"><i class="zmdi zmdi-time-restore"></i> Pending</span>
                                        @elseif ($ap->status==1)
                                            <span class="btn btn-sm btn-success shadow-sm"><i class="zmdi zmdi-check"></i> Success</span>
                                        @elseif ($ap->status==2)
                                            <span class="btn btn-sm btn-danger shadow-sm"><i class="zmdi zmdi-alert-triangle"></i> Rejected</span>
                                        @endif
                                    </td>
                                </div>


                            </tr>
                        @endforeach
                    </tbody>
                    @else
                            <p class="text-secondary text-center mt-5">There is no Appointment yet.</p>
                    @endif
                </table>
                <div class="mt-4" >
                    {{$appointments->links()}}
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection
