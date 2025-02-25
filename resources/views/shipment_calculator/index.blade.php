@extends('layouts.header')

@section('content')
    <h1>Shipment Calculator</h1>

    <form action="{{ route('shipment_calculator.calculate') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="origin" class="form-label">Origin</label>
            <select class="form-select" id="origin" name="origin" required>
                <option value="">Select Origin</option>
                @foreach($origins as $origin)
                    <option value="{{ $origin }}">{{ $origin }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="destination" class="form-label">Destination</label>
            <select class="form-select" id="destination" name="destination" required>
                <option value="">Select Destination</option>
                @foreach($destinations as $destination)
                    <option value="{{ $destination }}">{{ $destination }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="weight_rate" class="form-label">Weight Rate</label>
            <select class="form-select" id="weight_rate" name="weight_rate" required>
                <option value="">Select Weight Rate</option>
                @foreach($weightRates as $weightRate)
                    <option value="{{ $weightRate }}">{{ $weightRate }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Calculate</button>
    </form>
@endsection
