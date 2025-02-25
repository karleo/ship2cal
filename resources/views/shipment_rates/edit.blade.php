@extends('layouts.header')

@section('content')
    <h1>Edit Shipment Rate</h1>
    <a href="{{ route('shipment_rates.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('shipment_rates.update', $shipmentRate->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="vendor_id" class="form-label">Vendor</label>
            <select class="form-select" id="vendor_id" name="vendor_id" required>
                <option value="">Select a vendor</option>
                @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->id }}" {{ $shipmentRate->vendor_id == $vendor->id ? 'selected' : '' }}>{{ $vendor->company_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="origin" class="form-label">Origin</label>
            <input type="text" class="form-control" id="origin" name="origin" value="{{ $shipmentRate->origin }}" required>
        </div>
        <div class="mb-3">
            <label for="destination" class="form-label">Destination</label>
            <input type="text" class="form-control" id="destination" name="destination" value="{{ $shipmentRate->destination }}" required>
        </div>

        <h3>Weight Rates</h3>
        <div id="weight-rates-container">
            @foreach ($shipmentRate->weightRates as $index => $weightRate)
                <div class="weight-rate mb-3">
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="weight_rates[{{ $index }}][name]" value="{{ $weightRate->name }}" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Value</label>
                            <input type="number" class="form-control" name="weight_rates[{{ $index }}][value]" step="0.01" min="0" value="{{ $weightRate->value }}" required>
                        </div>
                        <div class="col-auto">
                            <label class="form-label">&nbsp;</label>
                            <button type="button" class="btn btn-danger d-block remove-weight-rate">Remove</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-secondary mb-3" id="add-weight-rate">Add Weight Rate</button>

        <h3>Charges</h3>
        <div id="charges-container">
            @foreach ($shipmentRate->charges as $index => $charge)
                <div class="charge mb-3">
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Type</label>
                            <select class="form-select" name="charges[{{ $index }}][type]" required>
                                <option value="fuel" {{ $charge->type == 'fuel' ? 'selected' : '' }}>Fuel</option>
                                <option value="documents" {{ $charge->type == 'documents' ? 'selected' : '' }}>Documents</option>
                                <option value="label" {{ $charge->type == 'label' ? 'selected' : '' }}>Label</option>
                                <option value="other" {{ $charge->type == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="charges[{{ $index }}][name]" value="{{ $charge->name }}" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control" name="charges[{{ $index }}][amount]" step="0.01" min="0" value="{{ $charge->amount }}" required>
                        </div>
                        <div class="col-auto">
                            <label class="form-label">&nbsp;</label>
                            <button type="button" class="btn btn-danger d-block remove-charge">Remove</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-secondary mb-3" id="add-charge">Add Charge</button>

        <div>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

    <script>
        let weightRateIndex = {{ $shipmentRate->weightRates->count() }};
        document.getElementById('add-weight-rate').addEventListener('click', function() {
            const container = document.getElementById('weight-rates-container');
            const newWeightRate = document.createElement('div');
            newWeightRate.className = 'weight-rate mb-3';
            newWeightRate.innerHTML = `
                <div class="row">
                    <div class="col">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="weight_rates[${weightRateIndex}][name]" required>
                    </div>
                    <div class="col">
                        <label class="form-label">Value</label>
                        <input type="number" class="form-control" name="weight_rates[${weightRateIndex}][value]" step="0.01" min="0" required>
                    </div>
                    <div class="col-auto">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-danger d-block remove-weight-rate">Remove</button>
                    </div>
                </div>
            `;
            container.appendChild(newWeightRate);
            weightRateIndex++;
        });

        let chargeIndex = {{ $shipmentRate->charges->count() }};
        document.getElementById('add-charge').addEventListener('click', function() {
            const container = document.getElementById('charges-container');
            const newCharge = document.createElement('div');
            newCharge.className = 'charge mb-3';
            newCharge.innerHTML = `
                <div class="row">
                    <div class="col">
                        <label class="form-label">Type</label>
                        <select class="form-select" name="charges[${chargeIndex}][type]" required>
                            <option value="fuel">Fuel</option>
                            <option value="documents">Documents</option>
                            <option value="label">Label</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="charges[${chargeIndex}][name]" required>
                    </div>
                    <div class="col">
                        <label class="form-label">Amount</label>
                        <input type="number" class="form-control" name="charges[${chargeIndex}][amount]" step="0.01" min="0" required>
                    </div>
                    <div class="col-  step="0.01" min="0" required>
                    </div>
                    <div class="col-auto">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-danger d-block remove-charge">Remove</button>
                    </div>
                </div>
            `;
            container.appendChild(newCharge);
            chargeIndex++;
        });

        // Event delegation for removing weight rates
        document.getElementById('weight-rates-container').addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-weight-rate')) {
                e.target.closest('.weight-rate').remove();
            }
        });

        // Event delegation for removing charges
        document.getElementById('charges-container').addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-charge')) {
                e.target.closest('.charge').remove();
            }
        });
    </script>
@endsection
