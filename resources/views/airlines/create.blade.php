@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Airline
                            <a href="{{ route('airlines.index') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('airlines.store') }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="code">Airline Code (3 characters):</label>
                                        <input type="text" name="code" class="form-control" placeholder="e.g. UAL" maxlength="3" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Airline Name:</label>
                                        <input type="text" name="name" class="form-control" placeholder="e.g. United Airlines" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="country_flag">Country Flag:</label>
                                        <input type="text" name="country_flag" class="form-control" placeholder="e.g. USA">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_number">Contact Number:</label>
                                        <input type="text" name="contact_number" class="form-control" placeholder="e.g. +1-800-864-8331">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" class="form-control" placeholder="e.g. contact@united.com">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
