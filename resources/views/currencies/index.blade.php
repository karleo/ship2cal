@extends('layouts.header')

@section('content')
    <h1>Currencies</h1>
    <a href="{{ route('currencies.create') }}" class="btn btn-primary mb-3">Add New Currency</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Rate</th>
                <th>Symbol</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($currencies as $currency)
                <tr>
                    <td>{{ $currency->name }}</td>
                    <td>{{ $currency->rate }}</td>
                    <td>{{ $currency->symbol }}</td>
                    <td>
                        <a href="{{ route('currencies.edit', $currency) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('currencies.destroy', $currency) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
