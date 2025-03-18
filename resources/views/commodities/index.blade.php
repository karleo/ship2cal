@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Commodities
                            <a href="{{ route('commodities.create') }}" class="btn btn-primary float-end">Add Commodity</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($commodities as $commodity)
                                <tr>
                                    <td>{{ $commodity->name }}</td>
                                    <td>{{ Str::limit($commodity->description, 100) }}</td>
                                    <td>
                                        <form action="{{ route('commodities.destroy', $commodity->id) }}" method="POST">
                                            <a class="btn btn-info btn-sm" href="{{ route('commodities.show', $commodity->id) }}">Show</a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('commodities.edit', $commodity->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
