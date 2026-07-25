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
    
    // 🔹 Fungsi warna berdasarkan tingkat kerentanan
    function getColorByTingkat(tingkat) {
        switch (tingkat) {
            case 'Low':
                return '#00AA00'; // Hijau
            case 'Medium':
                return '#FFD700'; // Kuning
            case 'High':
                return '#CC0000'; // Merah
            default:
                return '#95A5A6'; // Abu-abu (fallback)
        }
    }
    
    @if ($geojson)
        var geojson = {!! $geojson !!};
    
        var layer = L.geoJSON(geojson, {
    
            // ✅ STYLE POLYGON SESUAI "tingkat"
            style: function (feature) {
                let tingkat = feature.properties?.tingkat ?? null;
    
                return {
                    fillColor: getColorByTingkat(tingkat),
                    weight: 2,
                    opacity: 1,
                    color: '#2C3E50',
                    fillOpacity: 0.7
                };
            },
    
            // ✅ POPUP AMAN
            onEachFeature: function (feature, layer) {
                let p = feature.properties || {};
    
                let popup = `
                    <strong>Informasi Kerentanan</strong><br>
                    Lokasi: ${p.nama ?? 'Tidak diketahui'}<br>
                    Jenis Bencana: ${p.jenis ?? '-'}<br>
                    Tingkat Kerentanan: <strong>${p.tingkat ?? '-'}</strong><br>
                    Tanggal: ${p.tanggal ?? '-'}
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
