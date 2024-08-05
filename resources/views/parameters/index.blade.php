@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Parameters</h1>

    <x-parameter-search />

    <table class="table table-bordered table-hover">
        <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($parameters as $parameter)
            <tr>
                <td>{{ $parameter->id }}</td>
                <td>{{ $parameter->title }}</td>
                <td>{{ $parameter->type }}</td>
                <td>
                    <a href="{{ route('parameters.edit', $parameter) }}" class="btn btn-primary btn-sm">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
