@extends('layouts.header')

@section('content')
    <h1>Edit Currency</h1>
    <form action="{{ route('currencies.update', $currency) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $currency->name }}" required>
        </div>
        <div class="form-group">
            <label for="rate">Rate</label>
            <input type="number" step="0.0001" class="form-control" id="rate" name="rate" value="{{ $currency->rate }}" required>
        </div>
        <div class="form-group">
            <label for="symbol">Symbol</label>
            <input type="text" class="form-control" id="symbol" name="symbol" value="{{ $currency->symbol }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
