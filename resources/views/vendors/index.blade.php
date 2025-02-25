@extends('layouts.header')

@section('content')
    <h1>Vendor List</h1>
    <a href="{{ route('vendors.create') }}" class="btn btn-primary mb-3">Add New Vendor</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Contact Person</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendors as $vendor)
            <tr>
                <td>{{ $vendor->company_name }}</td>
                <td>{{ $vendor->contact_person }}</td>
                <td>{{ $vendor->contact_number }}</td>
                <td>{{ $vendor->address }}</td>
                <td>
                    <a href="{{ route('vendors.show', $vendor->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('vendors.edit', $vendor->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('vendors.destroy', $vendor->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this vendor?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
