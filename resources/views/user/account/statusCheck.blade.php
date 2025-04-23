@extends('user.layouts.master')

@section('title', 'Status')

@section('content')
    <!-- Cart Start -->
    <div class="container-fluid" style="min-height: 400px overflow-y:scroll;">
        <div class="row px-xl-5 mt-5 mb-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0" id="dataTable">
                    <thead class="thead-dark">
                        <thead>
                            <tr>
                                <th scope="col">Require For</th>
                                <th scope="col">Blood Type</th>
                                <th scope="col">Relation</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($bloodRequests as $br)

                            <tr>
                                <td class="align-middle" id=""scope="col">{{ $br->require_for }}</td>
                                <td class="align-middle" id=""scope="col">{{ $br->blood_type }}</td>
                                <td class="align-middle" id=""scope="col">{{ $br->relation }}</td>
                                <td class="align-middle" id=""scope="col">
                                    @if ($br->status==0)
                                        <span class="btn btn-sm btn-warning shadow-sm"><i class="zmdi zmdi-time-restore"></i> Pending...</span>
                                    @elseif ($br->status==1)
                                        <span class="btn btn-sm btn-success shadow-sm"><i class="zmdi zmdi-check"></i> Success</span>
                                    @elseif ($br->status==2)
                                        <span class="btn btn-sm btn-danger shadow-sm"><i class="zmdi zmdi-alert-triangle"></i> Rejected</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4" >
                    {{$bloodRequests->links()}}
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection
