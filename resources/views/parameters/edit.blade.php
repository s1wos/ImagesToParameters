@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Edit Parameter: {{ $parameter->title }}</h1>

    <form method="POST" action="{{ route('parameters.update', $parameter) }}" class="mb-4">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $parameter->title }}">
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="number" name="type" id="type" class="form-control" value="{{ $parameter->type }}">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>

    <form method="POST" action="{{ route('parameters.images.store', $parameter) }}" enctype="multipart/form-data" class="mb-4">
        @csrf
        <div class="form-group">
            <label for="icon">Icon</label>
            <input type="file" name="icon" id="icon" class="form-control">
        </div>
        <div class="form-group">
            <label for="icon_gray">Icon Gray</label>
            <input type="file" name="icon_gray" id="icon_gray" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Upload Images</button>
    </form>

    @if($parameter->images)
        @if($parameter->images->icon)
            <div class="mb-3">
                <img src="{{ asset('storage/parameters/' . $parameter->images->icon) }}" alt="Icon" class="img-thumbnail">
                <form method="POST" action="{{ route('parameters.images.destroy', [$parameter, 'icon']) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-2">Delete Icon</button>
                </form>
            </div>
        @endif
        @if($parameter->images->icon_gray)
            <div class="mb-3">
                <img src="{{ asset('storage/parameters/' . $parameter->images->icon_gray) }}" alt="Icon Gray" class="img-thumbnail">
                <form method="POST" action="{{ route('parameters.images.destroy', [$parameter, 'icon_gray']) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-2">Delete Icon Gray</button>
                </form>
            </div>
        @endif
    @endif
@endsection
