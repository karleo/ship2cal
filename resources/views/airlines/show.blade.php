@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Airline Details
                            <a href="{{ route('airlines.index') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Airline Code:</strong>
                            <p>{{ $airline->code }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Airline Name:</strong>
                            <p>{{ $airline->name }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Country Flag:</strong>
                            <p>{{ $airline->country_flag }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Contact Number:</strong>
                            <p>{{ $airline->contact_number }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Email:</strong>
                            <p>{{ $airline->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
