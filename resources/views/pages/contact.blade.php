@extends('layouts.app')

@section('title', 'Kontak')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        Hubungi Kami
    </h1>
</div>

<div class="row">

    <!-- Informasi Kontak -->
    <div class="col-lg-5 mb-4">

        <div class="card shadow">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Informasi Kontak
                </h6>
            </div>

            <div class="card-body">

                <div class="mb-4">
                    <i class="fas fa-user text-primary mr-2"></i>
                    <strong>Pengembang</strong>
                    <br>
                    Rizky Anugrah Pratama
                </div>

                <div class="mb-4">
                    <i class="fas fa-envelope text-primary mr-2"></i>
                    <strong>Email</strong>
                    <br>
                    211131007@mhs.stiki.ac.id
                </div>

                <div class="mb-4">
                    <i class="fas fa-university text-primary mr-2"></i>
                    <strong>Universitas</strong>
                    <br>
                    Universitas Bhinneka Nusantara   
                </div>

                <div class="mb-0">
                    <i class="fas fa-map-marker-alt text-primary mr-2"></i>
                    <strong>Lokasi</strong>
                    <br>
                    Malang, Jawa Timur
                </div>

            </div>

        </div>

    </div>

    <!-- Form -->
    <div class="col-lg-7 mb-4">

        <div class="card shadow">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Kirim Pesan
                </h6>
            </div>

            <div class="card-body">

                <form>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text"
                               class="form-control"
                               placeholder="Masukkan nama">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email"
                               class="form-control"
                               placeholder="Masukkan email">
                    </div>

                    <div class="form-group">
                        <label>Pesan</label>
                        <textarea class="form-control"
                                  rows="5"
                                  placeholder="Tulis pesan"></textarea>
                    </div>

                    <button type="button"
                            class="btn btn-primary">
                        <i class="fas fa-paper-plane mr-1"></i>
                        Kirim Pesan
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection