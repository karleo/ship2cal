@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Airlines
                            <a href="{{ route('airlines.create') }}" class="btn btn-primary float-end">Add Airline</a>
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
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Country Flag</th>
                                    <th>Contact Number</th>
                                    <th>Email</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($airlines as $airline)
                                <tr>
                                    <td>{{ $airline->code }}</td>
                                    <td>{{ $airline->name }}</td>
                                    <td>{{ $airline->country_flag }}</td>
                                    <td>{{ $airline->contact_number }}</td>
                                    <td>{{ $airline->email }}</td>
                                    <td>
                                        <form action="{{ route('airlines.destroy', $airline->id) }}" method="POST">
                                            <a class="btn btn-info btn-sm" href="{{ route('airlines.show', $airline->id) }}">Show</a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('airlines.edit', $airline->id) }}">Edit</a>
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
