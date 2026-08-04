@extends('layouts.app')

@section('title', 'Pemetaan Kerentanan Bencana Alam di Malang Raya')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    PETA KERENTANAN BENCANA ALAM DI MALANG RAYA
</h1>

<div class="row mb-3">

    <div class="col-md-4">
        <label><strong>Filter Jenis Bencana</strong></label>

        <select class="form-control" id="filterBencana">
            <option value="">Semua Bencana</option>
            <option value="Banjir">Banjir</option>
            <option value="Tanah Longsor">Tanah Longsor</option>
            <option value="Gempa Bumi">Gempa Bumi</option>
            <option value="Cuaca Ekstrem">Cuaca Ekstrem</option>
        </select>
    </div>

    <div class="col-md-4">
        <label><strong>Filter Daerah</strong></label>

        <select class="form-control" id="filterDaerah">
            <option value="">Semua Daerah</option>
        </select>
    </div>

</div>

<div id="map" style="height:600px; width:100%;"></div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>

    // ==========================================
    // Inisialisasi Peta
    // ==========================================

    var map = L.map('map').setView([-7.98, 112.63], 11);

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }
    ).addTo(map);


    // ==========================================
    // Warna Kerentanan
    // ==========================================

    function getColorByTingkat(tingkat) {

        switch (tingkat) {

            case 'Low':
                return '#00AA00';

            case 'Medium':
                return '#FFD700';

            case 'High':
                return '#CC0000';

            default:
                return '#95A5A6';

        }

    }


    // ==========================================
    // Radius Lingkaran
    // ==========================================

    function getRadius(tingkat) {

        switch (tingkat) {

            case 'Low':
                return 4000;

            case 'Medium':
                return 7000;

            case 'High':
                return 10000;

            default:
                return 5000;

        }

    }


    // ==========================================
    // Layer GeoJSON
    // ==========================================

    var geoLayer;

    @if($geojson)

        var geojson = {!! $geojson !!};

        geoLayer = L.geoJSON(geojson, {

            pointToLayer: function (feature, latlng) {

                return L.circle(latlng, {

                    radius: getRadius(feature.properties.tingkat),
                    color: getColorByTingkat(feature.properties.tingkat),
                    weight: 2,
                    fillColor: getColorByTingkat(feature.properties.tingkat),
                    fillOpacity: 0.35

                });

            },

            onEachFeature: function (feature, layer) {

                let p = feature.properties || {};

                layer.bindPopup(`

                    <div style="min-width:220px">

                        <h6 class="mb-2">
                            <b>Informasi Kerentanan</b>
                        </h6>

                        <hr>

                        <b>Lokasi</b><br>
                        ${p.nama ?? '-'}<br><br>

                        <b>Jenis Bencana</b><br>
                        ${p.jenis_bencana ?? '-'}<br><br>

                        <b>Skor Overlay</b><br>
                        ${p.skor_overlay ?? '-'}<br><br>

                        <b>Tingkat Kerentanan</b><br>

                        <span style="
                            color:${getColorByTingkat(p.tingkat)};
                            font-weight:bold;
                        ">
                            ${p.tingkat ?? '-'}
                        </span>

                    </div>

                `);

            }

        }).addTo(map);

        map.fitBounds(geoLayer.getBounds());


        // ==========================================
        // Isi Otomatis Filter Daerah
        // ==========================================

        let daftarDaerah = [];

        geoLayer.eachLayer(function (layer) {

            let nama = layer.feature.properties.nama;

            if (!daftarDaerah.includes(nama)) {
                daftarDaerah.push(nama);
            }

        });

        daftarDaerah.sort();

        let selectDaerah = document.getElementById("filterDaerah");

        daftarDaerah.forEach(function (nama) {

            let option = document.createElement("option");

            option.value = nama;
            option.text = nama;

            selectDaerah.appendChild(option);

        });

    @else

        console.log("Belum ada GeoJSON aktif.");

    @endif


    // ==========================================
    // Filter Data
    // ==========================================

    function filterData() {

        let jenis = document.getElementById("filterBencana").value;
        let daerah = document.getElementById("filterDaerah").value;

        geoLayer.eachLayer(function (layer) {

            let p = layer.feature.properties;

            let cocokJenis =
                (jenis === "" || p.jenis_bencana === jenis);

            let cocokDaerah =
                (daerah === "" || p.nama === daerah);

            if (cocokJenis && cocokDaerah) {

                if (!map.hasLayer(layer)) {
                    layer.addTo(map);
                }

            } else {

                if (map.hasLayer(layer)) {
                    map.removeLayer(layer);
                }

            }

        });

    }

    document
        .getElementById("filterBencana")
        .addEventListener("change", filterData);

    document
        .getElementById("filterDaerah")
        .addEventListener("change", filterData);


    // ==========================================
    // Legenda
    // ==========================================

    var legend = L.control({

        position: 'bottomright'

    });

    legend.onAdd = function () {

        var div = L.DomUtil.create('div');

        div.style.background = 'white';
        div.style.padding = '12px';
        div.style.borderRadius = '8px';
        div.style.boxShadow = '0 0 10px rgba(0,0,0,.2)';
        div.style.lineHeight = '24px';

        div.innerHTML =

            '<b>LEGENDA</b><hr style="margin:6px 0;">' +

            '<div><span style="display:inline-block;width:15px;height:15px;background:#00AA00;border:1px solid #000;"></span> Rendah</div>' +

            '<div><span style="display:inline-block;width:15px;height:15px;background:#FFD700;border:1px solid #000;"></span> Sedang</div>' +

            '<div><span style="display:inline-block;width:15px;height:15px;background:#CC0000;border:1px solid #000;"></span> Tinggi</div>' +

            '<hr style="margin:6px 0;">' +

            '<small><b>Radius</b><br>Low : 4 km<br>Medium : 7 km<br>High : 10 km</small>';

        return div;

    };

    legend.addTo(map);

</script>

@endsection