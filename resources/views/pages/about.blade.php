@extends('layouts.app')

@section('title', 'Tentang')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tentang Aplikasi</h1>
</div>

<div class="row">

    <!-- Informasi Aplikasi -->
    <div class="col-lg-8 mb-4">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Sistem Informasi Geografis Peta Kerentanan Bencana Alam
                </h6>
            </div>

           <div class="card-body">

    <h5 class="font-weight-bold text-dark mb-3">
        Pemetaan Kerentanan Bencana Alam di Malang Raya
    </h5>

    <p class="text-justify">
        Website ini merupakan prototype <strong>Sistem Informasi Geografis (SIG)</strong>
        yang dikembangkan sebagai bagian dari penelitian skripsi dengan judul
        <strong>"Pemetaan Kerentanan Bencana Alam di Malang Raya Menggunakan Sistem Informasi Geografis dan Metode Overlay"</strong>.
    </p>

    <p class="text-justify">
        Sistem ini bertujuan menyajikan informasi spasial mengenai tingkat
        kerentanan bencana alam dalam bentuk peta interaktif sehingga masyarakat,
        akademisi, maupun pemerintah dapat memperoleh informasi secara lebih
        mudah, cepat, dan informatif.
    </p>

    <p class="text-justify mb-0">
        Data yang ditampilkan merupakan hasil pengolahan menggunakan metode
        <strong>Weighted Overlay</strong> dengan memanfaatkan data spasial yang
        disajikan dalam format <strong>GeoJSON</strong>.
    </p>

</div>

        </div>

    </div>

    <!-- Tujuan -->
    <div class="col-lg-4 mb-4">

        <div class="card shadow">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Tujuan
                </h6>
            </div>

            <div class="card-body">

    <ul class="mb-0">
        <li>Memvisualisasikan tingkat kerentanan bencana alam di Malang Raya.</li>
        <li>Menyajikan informasi spasial dalam bentuk peta interaktif.</li>
        <li>Mendukung penyebaran informasi mitigasi bencana.</li>
        <li>Menjadi media pendukung penelitian berbasis Sistem Informasi Geografis.</li>
    </ul>

</div>

        </div>

    </div>

</div>

<div class="row">

    <!-- Teknologi -->
    <div class="col-lg-6 mb-4">

        <div class="card shadow">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Teknologi
                </h6>
            </div>

            <div class="card-body">

    <span class="badge badge-primary p-2 mb-2">Laravel 12</span>
    <span class="badge badge-success p-2 mb-2">Docker</span>
    <span class="badge badge-info p-2 mb-2">Leaflet JS</span>
    <span class="badge badge-warning p-2 mb-2">GeoJSON</span>
    <span class="badge badge-danger p-2 mb-2">MySQL</span>
    <span class="badge badge-secondary p-2 mb-2">Bootstrap SB Admin 2</span>

</div>

        </div>

    </div>

<!-- Profil Pengembang -->
<div class="col-lg-6 mb-4">

    <div class="card shadow">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Profil Pengembang
            </h6>
        </div>

        <div class="card-body text-center">

            <img src="{{ asset('img/dev.JPG') }}"
                 class="rounded-circle shadow mb-3"
                 width="170"
                 alt="Developer">

            <h4 class="font-weight-bold text-dark mb-1">
                Rizky Anugrah Pratama
            </h4>

            <p class="text-muted mb-4">
                Pengembang Sistem
            </p>

            <table class="table table-borderless table-sm text-left">

                <tr>
                    <th width="130">NRP</th>
                    <td>: 211131007</td>
                </tr>

                <tr>
                    <th>Program Studi</th>
                    <td>: Sistem Informasi</td>
                </tr>

                <tr>
                    <th>Universitas</th>
                    <td>: Universitas Bhinneka Nusantara</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>: 211131007@mhs.stiki.ac.id</td>
                </tr>

            </table>

            <hr>

            <p class="small text-muted mb-0">
                Website ini dikembangkan sebagai prototype Sistem Informasi
                Geografis untuk mendukung visualisasi peta kerentanan bencana
                alam sebagai bagian dari penelitian skripsi.
            </p>

        </div>

    </div>

</div>

@endsection