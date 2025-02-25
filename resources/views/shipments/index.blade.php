@extends('layouts.app')

@section('content')
    <h1>Shipments</h1>
    <a href="{{ route('shipments.create') }}" class="btn btn-primary mb-3">Add New Shipment</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Vendor</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shipments as $shipment)
            <tr>
                <td>{{ $shipment->vendor->company_name }}</td>
                <td>{{ $shipment->origin }}</td>
                <td>{{ $shipment->destination }}</td>
                <td>
                    <a href="{{ route('shipments.show', $shipment->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('shipments.edit', $shipment->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('shipments.destroy', $shipment->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this shipment?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
