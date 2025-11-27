@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail File GeoJSON: {{ $file->name }}</h3>

    <pre style="background:#f7f7f7; padding: 15px; border:1px solid #ddd;">
{{ $content }}
    </pre>

    <a href="{{ route('geojson.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
    