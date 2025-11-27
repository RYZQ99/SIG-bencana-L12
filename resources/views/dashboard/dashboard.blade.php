@extends('layouts.app')

@section('title', 'Pemetaan Kerentanan Bencana Alam di Malang Raya')

@section('content')

<h1 class="h3 mb-4 text-gray-800">PETA KERENTANAN BENCANA ALAM DI MALANG RAYA</h1>

<div id="map" style="height: 600px; width: 100%;"></div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
var map = L.map('map').setView([-7.98, 112.63], 12);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19
}).addTo(map);

@if ($geojson)
    var geojson = {!! $geojson !!};

    var layer = L.geoJSON(geojson, {
        onEachFeature: function (feature, layer) {
            let p = feature.properties;
            let popup = `
                <strong>${p.nama}</strong><br>
                Jenis: ${p.jenis}<br>
                Tingkat: ${p.tingkat}<br>
                Tanggal: ${p.tanggal}
            `;
            layer.bindPopup(popup);
        }
    }).addTo(map);

    map.fitBounds(layer.getBounds());
@else
    console.warn("Belum ada file GeoJSON yang di-deploy.");
@endif
</script>

@endsection
