@extends('layouts.app')

@section('content')
<div class="container">
    <h3>List Data GeoJSON</h3>

    <a href="{{ route('geojson.create') }}" class="btn btn-primary mb-3">Upload GeoJSON</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Filename</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($files as $file)
            <tr>
                <td>{{ $file->name }}</td>
                <td>{{ $file->filename }}</td>
                <td>
                    @if ($file->is_deployed)
                        <span class="badge bg-success">Deployed</span>
                    @else
                        <span class="badge bg-secondary">Tidak</span>
                    @endif
                </td>
                <td>
                    @if($file->is_deployed)

    <a href="{{ route('geojson.undeploy', $file->id) }}"
       class="btn btn-warning btn-sm">
        Undeploy
    </a>

@else

    <a href="{{ route('geojson.deploy', $file->id) }}"
       class="btn btn-success btn-sm">
        Deploy
    </a>

@endif
                    <a href="{{ route('geojson.show', $file->id) }}" class="btn btn-info btn-sm">View</a>

                    <form method="POST" action="{{ route('geojson.destroy', $file->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus file?')" class="btn btn-danger btn-sm">
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
