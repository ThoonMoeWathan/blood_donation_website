@extends('admin.layouts.master')

@section('title','Edit Blood Inventory')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 offset-8">
                        <a href="{{ route('bloodInventory#list') }}">
                            <button class="btn bg-dark text-white my-3">List</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit Blood Inventory</h3>
                            </div>
                            <hr>
                            <form action="{{ route('bloodInventory#update', $bloodInventory->id) }}" method="post" novalidate="novalidate">
                                @csrf

                                <div class="form-group">
                                    <label class="control-label mb-1">Choose Blood Bank for Inventory is Stored</label>
                                    <select name="bloodBank" class="form-control @error('bloodBank') is-invalid @enderror">
                                        <option value="">Which Blood Bank?</option>
                                        @foreach ($bloodBank as $bb)
                                            <option value="{{ $bb->id }}" {{ $bloodInventory->bank_id == $bb->id ? 'selected' : '' }}>
                                                {{ $bb->bank_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('bloodBank')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label mb-1">Choose Blood Type for this Inventory</label>
                                    <select name="bloodGroup" class="form-control @error('bloodGroup') is-invalid @enderror">
                                        <option value="">Which Blood Type?</option>
                                        @foreach ($bloodGroup as $bg)
                                            <option value="{{ $bg->id }}" {{ $bloodInventory->blood_group_id == $bg->id ? 'selected' : '' }}>
                                                {{ $bg->blood_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('bloodGroup')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="collectionDate" class="control-label mb-1">Collection Date</label>
                                    <input name="collectionDate" type="date" value="{{ old('collectionDate', $bloodInventory->collection_date) }}"
                                        class="form-control @error('collectionDate') is-invalid @enderror" placeholder="Enter Collection Date">
                                    @error('collectionDate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="expiryDate" class="control-label mb-1">Expiry Date</label>
                                    <input name="expiryDate" type="date" value="{{ old('expiryDate', $bloodInventory->expiry_date) }}"
                                        class="form-control @error('expiryDate') is-invalid @enderror" placeholder="Enter Expiry Date of Collected Blood">
                                    @error('expiryDate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="temperature" class="control-label mb-1">Temperature (°C)</label>
                                    <input name="temperature" type="number" value="{{ old('temperature', $bloodInventory->temperature) }}"
                                        class="form-control @error('temperature') is-invalid @enderror" placeholder="Enter Blood Collection Temperature">
                                    @error('temperature')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="quantity" class="control-label mb-1">Quantity</label>
                                    <input name="quantity" type="number" value="{{ old('quantity', $bloodInventory->quantity) }}"
                                        class="form-control @error('quantity') is-invalid @enderror" placeholder="Enter Blood Bag Quantity">
                                    @error('quantity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label mb-1">Current Status for Blood Inventory</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="">Status</option>
                                        @foreach (['Available', 'Reserved', 'Used', 'Expired', 'Damaged', 'In Testing', 'Rejected'] as $status)
                                            <option value="{{ $status }}" {{ $bloodInventory->status == $status ? 'selected' : '' }}>
                                                {{ $status }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label mb-1">Test Result for Blood Inventory</label>
                                    <select name="testResult" class="form-control @error('testResult') is-invalid @enderror">
                                        <option value="">Result</option>
                                        @foreach (['Safe', 'Infected', 'Pending', 'Rejected'] as $result)
                                            <option value="{{ $result }}" {{ $bloodInventory->test_result == $result ? 'selected' : '' }}>
                                                {{ $result }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('testResult')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-lg btn-danger btn-block">
                                        <span>Update</span>
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

@endsection
