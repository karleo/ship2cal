@extends('layouts.header')

@section('content')
    <h1>Add New Currency</h1>
    <form action="{{ route('currencies.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="rate">Rate</label>
            <input type="number" step="0.0001" class="form-control" id="rate" name="rate" required>
        </div>
        <div class="form-group">
            <label for="symbol">Symbol</label>
            <input type="text" class="form-control" id="symbol" name="symbol" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
