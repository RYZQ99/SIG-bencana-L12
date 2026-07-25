@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Upload File GeoJSON</h3>

        <form action="{{ route('geojson.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Nama File</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>File GeoJSON</label>
                <input type="file" name="file" class="form-control" required>
            </div>

            <button class="btn btn-primary">Upload</button>
        </form>
    </div>
@endsection
