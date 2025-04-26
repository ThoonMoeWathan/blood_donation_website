@extends('admin.layouts.master')

@section('title','Create Blood Group')

@section('content')
    <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3 offset-8">
                                <a href="{{route('bloodInventory#list')}}"><button class="btn bg-dark text-white my-3">List</button></a>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Add New Blood Inventory</h3>
                                    </div>
                                    <hr>
                                    <form action="{{route('bloodInventory#create')}}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label mb-1">Choose Blood Bank for Inventory is Stored</label>
                                            <select name="bloodBank" id=""
                                                class="form-control @error('bloodBank') is-invalid @enderror">
                                                <option value="">Which Blood Bank?</option>
                                                @foreach ($bloodBank as $bb)
                                                    <option value="{{ $bb->id }}"> {{ $bb->bank_name }} </option>
                                                @endforeach
                                            </select>
                                            @error('bloodBank')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Choose Blood Type for this inventory</label>
                                            <select name="bloodGroup" id=""
                                                class="form-control @error('bloodGroup') is-invalid @enderror">
                                                <option value="">Which Blood Type?</option>
                                                @foreach ($bloodGroup as $bg)
                                                    <option value="{{ $bg->id }}"> {{ $bg->blood_type }} </option>
                                                @endforeach
                                            </select>
                                            @error('bloodGroup')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="collectionDate" class="control-label mb-1">Collection Date</label>
                                            <input id="cc-pament" name="collectionDate" type="date" value="{{old('collectionDate')}}" class="form-control @error('collectionDate') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Collection Date">
                                            @error('collectionDate')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="expiryDate" class="control-label mb-1">Expiry Date</label>
                                            <input id="cc-pament" name="expiryDate" type="date" value="{{old('expiryDate')}}" class="form-control @error('expiryDate') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Expiry Date of Collected Blood">
                                            @error('expiryDate')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="temperature" class="control-label mb-1">Temperature (Celsius)</label>
                                            <input id="cc-pament" name="temperature" type="number" value="{{old('temperature')}}" class="form-control @error('temperature') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter temperature of the Blood Collection">
                                            @error('temperature')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity" class="control-label mb-1">Quantity</label>
                                            <input id="cc-pament" name="quantity" type="number" value="{{old('quantity')}}" class="form-control @error('quantity') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Blood Bag Quantity">
                                            @error('quantity')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Current Status for Blood Inventory</label>
                                            <select name="status" id=""
                                                class="form-control @error('status') is-invalid @enderror">
                                                <option value="">Status</option>
                                                <option value="Available">Available</option>
                                                <option value="Reserved">Reserved</option>
                                                <option value="Used">Used</option>
                                                <option value="Expired">Expired</option>
                                                <option value="Damaged">Damaged</option>
                                                <option value="In Testing">In Testing</option>
                                                <option value="Rejected">Rejected</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Test Result for Blood Inventory</label>
                                            <select name="testResult" id=""
                                                class="form-control @error('testResult') is-invalid @enderror">
                                                <option value="">Result</option>
                                                <option value="Safe">Safe</option>
                                                <option value="Infected">Infected</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Rejected">Rejected</option>
                                            </select>
                                            @error('testResult')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-danger btn-block">
                                                <span id="payment-button-amount">Create</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
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
