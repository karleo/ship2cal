@extends('layouts.header')

@section('content')
    <h1>Shipment Rates</h1>
    <a href="{{ route('shipment_rates.create') }}" class="btn btn-primary mb-3">Add New Shipment Rate</a>

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
                <th>Weight Rates</th>
                <th>Charges</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shipmentRates as $rate)
            <tr>
                <td>{{ $rate->vendor->company_name }}</td>
                <td>{{ $rate->origin }}</td>
                <td>{{ $rate->destination }}</td>
                <td>
                    @foreach ($rate->weightRates as $weightRate)
                        {{ $weightRate->name }}: ${{ number_format($weightRate->value, 2) }}<br>
                    @endforeach
                </td>
                <td>
                    @foreach ($rate->charges as $charge)
                        {{ ucfirst($charge->type) }} - {{ $charge->name }}: ${{ number_format($charge->amount, 2) }}<br>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('shipment_rates.show', $rate->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('shipment_rates.edit', $rate->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('shipment_rates.destroy', $rate->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this shipment rate?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
