@extends('template')

@section('body')
    <div class="container mt-3">
        <div class="row my-5">
            <hr>
            <h1 class="about_sjh ps-5">SI JARI HANDAL</h1>
            <div class="col-md-6 mt-3">
                <h5>Sebuah website satu pintu untuk pencarian semua koleksi arsip dan buku yang tersedia di Dinas
                    Perpustakaan dan Arsip Daerah DIY
                </h5>
                <h5>SiJARI HanDAL memudahkan pengguna dalam melakukan pencarian arsip beserta sumber-sumber yang mendukung
                    seperti buku</h5>
                <a href="/home" class="btn btn-outline-primary d-block mt-5">Cari Arsip dan Buku Mu Sekarang <i
                        class="bi bi-arrow-right"></i></a>
            </div>

            <div class="col-md-6">
                <img src="/img/Logo Search.png" alt="" width="100%">
            </div>

        </div>

        <div class="row my-5">
            <hr>
            <h1 class="about_sjh ps-5">Koleksi</h1>
            <div class="col-md-6">
                <img src="/img/koleksi.png" alt="" width="100%">
            </div>
            <div class="col-md-6 mt-5">
                <h4>Saat ini terdapat <strong> {{ $arsip }} </strong> koleksi arsip dan <strong> {{ $buku }}
                    </strong> koleksi buku</h4>
                <a href="/home" class="btn btn-outline-primary d-block mt-5">Cari Arsip dan Buku <i
                        class="bi bi-arrow-right"></i></a>
                <a href="{{ url('/arsip') }}" class="btn btn-outline-primary d-block mt-2">Cari Arsip <i
                        class="bi bi-arrow-right"></i></a>
                <a href="{{ url('/buku') }}" class="btn btn-outline-primary d-block mt-2">Cari Buku <i
                        class="bi bi-arrow-right"></i></a>
            </div>

        </div>

        <div class="row my-5">
            <hr>
            <h1 class="about_sjh ps-5">Mitra</h1>
            <div class="col-md-6 mt-5">
                <h4>Kami bekerja sama dengan sejumlah Dinas dan Universitas yang ada di Yogyakarta</h4>
                <a href="/mitra" class="btn btn-outline-primary d-block mt-2">Lihat Mitra <i
                        class="bi bi-arrow-right"></i></a>
            </div>
            <div class="col-md-6">
                <img src="/img/mitra.png" alt="" width="100%">
            </div>

        </div>


    </div>
@endsection
