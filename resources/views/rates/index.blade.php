@extends('layouts.app')

@section('content')
    <h1>Rates</h1>
    <a href="{{ route('rates.create') }}" class="btn btn-primary mb-3">Add New Rate</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Shipment</th>
                <th>Base Rate</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rates as $rate)
            <tr>
                <td>{{ $rate->shipment->origin }} - {{ $rate->shipment->destination }}</td>
                <td>${{ number_format($rate->base_rate, 2) }}</td>
                <td>
                    <a href="{{ route('rates.show', $rate->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('rates.edit', $rate->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('rates.destroy',  }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('rates.destroy', $rate->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this rate?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
