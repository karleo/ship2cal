@extends('layouts.header')

@section('content')
    <h1>Weight Rates</h1>
    <a href="{{ route('weight_rates.create') }}" class="btn btn-primary mb-3">Add New Weight Rate</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Rate</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($weightRates as $weightRate)
            <tr>
                <td>{{ $weightRate->name }}</td>
                <td>${{ number_format($weightRate->rate, 2) }}</td>
                <td>
                    <a href="{{ route('weight_rates.edit', $weightRate->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('weight_rates.destroy', $weightRate->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this weight rate?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
