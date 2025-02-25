@extends('layouts.header')

@section('content')
    <h1>Shipment Calculator Results</h1>

    <h2>Search Criteria</h2>
    <p><strong>Origin:</strong> {{ $request->origin }}</p>
    <p><strong>Destination:</strong> {{ $request->destination }}</p>
    <p><strong>Weight Rate:</strong> {{ $request->weight_rate }}</p>

    <h2>Results</h2>

    @if(count($results) > 0)
        @foreach($results as $result)
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">{{ $result['vendor']->company_name }}</h3>
                    <p><strong>Origin:</strong> {{ $result['shipmentRate']->origin }}</p>
                    <p><strong>Destination:</strong> {{ $result['shipmentRate']->destination }}</p>

                    @if($result['appliedWeightRate'])
                        <p><strong>Applied Weight Rate:</strong> {{ $result['appliedWeightRate']->name }} - ${{ number_format($result['appliedWeightRate']->value, 2) }}</p>
                    @else
                        <p><strong>Applied Weight Rate:</strong> N/A</p>
                    @endif

                    <h4>Charges:</h4>
                    <ul>
                        @foreach($result['shipmentRate']->charges as $charge)
                            <li>{{ $charge->name }} ({{ ucfirst($charge->type) }}): ${{ number_format($charge->amount, 2) }}</li>
                        @endforeach
                    </ul>

                    <h4>Total Cost: ${{ number_format($result['totalCost'], 2) }}</h4>
                </div>
            </div>
        @endforeach
    @else
        <p>No shipment rates found for the given criteria.</p>
    @endif

    <a href="{{ route('shipment_calculator.index') }}" class="btn btn-primary">New Calculation</a>
@endsection
