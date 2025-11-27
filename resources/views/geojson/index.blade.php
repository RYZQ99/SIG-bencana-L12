@extends('layouts.app')

@section('content')
<div class="container">

    <h3>🗂️ Manajemen Data GeoJSON</h3>

    {{-- Upload Form --}}
    <form action="{{ route('geojson.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf

        <div class="row">
            <div class="col-md-4">
                <label>Nama Data</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label>File GeoJSON (.geojson)</label>
                <input type="file" name="file" class="form-control" required>
            </div>

            <div class="col-md-4">
                <button class="btn btn-primary mt-4">Upload</button>
            </div>
        </div>
    </form>

    {{-- Tabel List --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>File</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($files as $file)
            <tr>
                <td>{{ $file->name }}</td>
                <td>{{ $file->filename }}</td>

                <td>
                    @if($file->is_active)
                        <span class="badge bg-success">Active (Deployed)</span>
                    @else
                        <span class="badge bg-secondary">Not Active</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('geojson.show', $file->id) }}" class="btn btn-info btn-sm">
                        View
                    </a>

                    <form action="{{ route('geojson.deploy', $file->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn btn-warning btn-sm">
                            Deploy
                        </button>
                    </form>

                    <form action="{{ route('geojson.delete', $file->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
