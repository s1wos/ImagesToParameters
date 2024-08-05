<form method="GET" action="{{ route('parameters.index') }}" class="mb-4">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="search-id">ID</label>
                <input type="text" name="id" id="search-id" class="form-control" placeholder="ID" value="{{ request('id') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="search-title">Title</label>
                <input type="text" name="title" id="search-title" class="form-control" placeholder="Title" value="{{ request('title') }}">
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-end">
            <button type="submit" class="btn btn-primary mr-2">Search</button>
            <a href="{{ route('parameters.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </div>
</form>
