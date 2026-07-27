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

                <p align="justify">
                    Sistem ini merupakan prototype Sistem Informasi Geografis
                    (SIG) yang digunakan untuk menampilkan peta kerentanan
                    bencana alam secara interaktif menggunakan data GeoJSON.
                </p>

                <p align="justify">
                    Website ini dikembangkan sebagai media visualisasi data
                    spasial sehingga pengguna dapat melihat informasi
                    kerentanan bencana secara lebih mudah, cepat,
                    dan informatif.
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
                    <li>Visualisasi data GeoJSON.</li>
                    <li>Media penyebaran informasi.</li>
                    <li>Mendukung mitigasi bencana.</li>
                    <li>Prototype penelitian.</li>
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

                <span class="badge badge-primary mb-2">Laravel</span>
                <span class="badge badge-success mb-2">Docker</span>
                <span class="badge badge-info mb-2">Leaflet JS</span>
                <span class="badge badge-warning mb-2">GeoJSON</span>
                <span class="badge badge-secondary mb-2">Bootstrap SB Admin 2</span>
                <span class="badge badge-danger mb-2">MySQL</span>

            </div>

        </div>

    </div>

    <!-- Pengembang -->
    <div class="col-lg-6 mb-4">

        <div class="card shadow">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Pengembang
                </h6>
            </div>

            <div class="card-body">

                <table class="table table-borderless table-sm mb-0">

                    <tr>
                        <th width="120">Nama</th>
                        <td>: Rizky Anugrah Pratama</td>
                    </tr>

                    <tr>
                        <th>NRP</th>
                        <td>: 211131007</td>
                    </tr>

                    <tr>
                        <th>Framework</th>
                        <td>: Laravel 12</td>
                    </tr>

                    <tr>
                        <th>Database</th>
                        <td>: MySQL</td>
                    </tr>

                    <tr>
                        <th>Template</th>
                        <td>: SB Admin 2</td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection