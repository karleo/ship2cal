@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Commodity Details
                            <a href="{{ route('commodities.index') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Commodity Name:</strong>
                            <p>{{ $commodity->name }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Description:</strong>
                            <p>{{ $commodity->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
