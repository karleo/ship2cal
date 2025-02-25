@extends('layouts.header')

@section('content')
    <h1>Edit Vendor</h1>
    <a href="{{ route('vendors.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vendors.update', $vendor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $vendor->company_name }}" required>
        </div>
        <div class="mb-3">
            <label for="contact_person" class="form-label">Contact Person</label>
            <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ $vendor->contact_person }}" required>
        </div>
        <div class="mb-3">
            <label for="contact_number" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $vendor->contact_number }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" rows="3" required>{{ $vendor->address }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
