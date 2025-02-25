@extends('layouts.header')

@section('content')
    <h1>Vendor Details</h1>
    <a href="{{ route('vendors.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $vendor->company_name }}</h5>
            <p class="card-text"><strong>Contact Person:</strong> {{ $vendor->contact_person }}</p>
            <p class="card-text"><strong>Contact Number:</strong> {{ $vendor->contact_number }}</p>
            <p class="card-text"><strong>Address:</strong> {{ $vendor->address }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('vendors.edit', $vendor->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('vendors.destroy', $vendor->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this vendor?')">Delete</button>
        </form>
    </div>
@endsection
