@extends('layouts.app')

@section('content')
    <h1>Charges</h1>
    <a href="{{ route('charges.create') }}" class="btn btn-primary mb-3">Add New Charge</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Rate</th>
                <th>Type</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($charges as $charge)
            <tr>
                <td>{{ $charge->rate->shipment->origin }} - {{ $charge->rate->shipment->destination }}</td>
                <td>{{ ucfirst($charge->type) }}</td>
                <td>{{ $charge->description }}</td>
                <td>${{ number_format($charge->amount, 2) }}</td>
                <td>
                    <a href="{{ route('charges.show', $charge->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('charges.edit', $charge->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('charges.destroy', $charge->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this charge?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
