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
                                <h2 class="title-1">Donated Fund History</h2>

                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-3">
                            <h4 class="text-secondary">Search key : <span class="text-success">{{request('key')}}</span> </h4>
                        </div>
                    <div class="col-3 offset-9">
                        <form action="{{route('admin#fundList')}}" method="get">
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
                            <h4> <i class="fa-solid fa-building"></i> ( {{ $funds->total() }} ) </h4>
                        </div>
                    </div>
                    @if (count($funds) != 0)
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Donated Amount</th>
                                        <th>Created At</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($funds as $f)
                                        <tr class="tr-shadow">
                                            <td> {{ $f->id }} </td>
                                            <td> {{ $f->user_name }} </td>
                                            <td> {{ $f->amount }} $</td>
                                            <td> {{ $f->created_at->format('j-F-Y') }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{-- {{ $funds->link() }} --}}
                                {{ $funds->appends(request()->query())->links() }}
                            </div>
                        </div>
                    @else
                        <h3 class="text-secondary text-center mt-5">There is no Fund Donated yet.</h3>
                    @endif
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
