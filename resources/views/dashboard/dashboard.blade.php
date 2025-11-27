@extends('layouts.app')

@section('title', 'Pemetaan Kerentanan Bencana Alam di Malang Raya')

@section('content')

<h1 class="h3 mb-4 text-gray-800">PETA KERENTANAN BENCANA ALAM DI MALANG RAYA</h1>

<div id="map" style="height: 600px; width: 100%;"></div>

{{-- Leaflet CSS --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

{{-- Leaflet JS --}}
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    // Inisialisasi Peta (Malang Raya)
    var map = L.map('map').setView([-7.98, 112.63], 10);

    // Basemap OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
    }).addTo(map);

    var layers = {};

    @foreach ($bencana as $data)

        // Abaikan jika tidak ada geojson_path (akan dilewati)
        @if (!empty($data->geojson_path))

            fetch("{{ route('geojson.show', $data->id) }}")
                .then(response => {
                    if (!response.ok) {
                        console.warn("GeoJSON tidak ditemukan untuk ID:", "{{ $data->id }}");
                        return null; // stop
                    }
                    return response.json();
                })
                .then(geojsonData => {
                    if (!geojsonData) return; // skip jika kosong

                    var layer = L.geoJSON(geojsonData, {
                        style: {
                            color: '{{ $data->warna ?? "#ff0000" }}',
                            weight: 2,
                        },
                        onEachFeature: function (feature, layer) {
                            layer.bindPopup(`
                                <strong>{{ $data->nama_bencana }}</strong><br>
                                Jenis: {{ $data->kategori ?? '-' }}<br>
                                Tahun: {{ $data->tahun ?? '-' }}
                            `);
                        }
                    }).addTo(map);

                    layers["{{ $data->nama_bencana }}"] = layer;
                })
                .catch(err => {
                    console.error("Error membaca GeoJSON:", err);
                });

        @endif

    @endforeach

</script>

@endsection
