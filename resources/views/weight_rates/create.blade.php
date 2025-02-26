@extends('layouts.header')

@section('content')
    <h1>Add New Weight Rate</h1>
    <a href="{{ route('weight_rates.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('weight_rates.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="rate" class="form-label">Rate</label>
            <input type="number" class="form-control" id="rate" name="rate" step="0.01" min="0" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
