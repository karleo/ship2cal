@extends('layouts.header')

@section('content')
    <h1>Shipment Rate Details</h1>
    <a href="{{ route('shipment_rates.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $shipmentRate->vendor->company_name }}</h5>
            <p class="card-text"><strong>Origin:</strong> {{ $shipmentRate->origin }}</p>
            <p class="card-text"><strong>Destination:</strong> {{ $shipmentRate->destination }}</p>

            <h6>Weight Rates:</h6>
            <ul>
                @foreach ($shipmentRate->weightRates as $weightRate)
                    <li>{{ $weightRate->name }}: ${{ number_format($weightRate->value, 2) }}</li>
                @endforeach
            </ul>

            <h6>Charges:</h6>
            <ul>
                @foreach ($shipmentRate->charges as $charge)
                    <li>{{ ucfirst($charge->type) }} - {{ $charge->name }}: ${{ number_format($charge->amount, 2) }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('shipment_rates.edit', $shipmentRate->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('shipment_rates.destroy', $shipmentRate->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this shipment rate?')">Delete</button>
        </form>
    </div>
@endsection
