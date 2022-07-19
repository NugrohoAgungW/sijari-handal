@extends('template')

@section('body')
    <div class="container py-5">
        <h1 class="text-center">Si JARI HanDAL</h1>
        <div class="mt-5">
            <form method="POST" action="/cari">
                @csrf
                @method('post')
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                    <input type="text" name="keyword" class="form-control form-control-lg"
                        placeholder="Cari Arsip dan Buku ..." required>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 offset-md-3 my-1">
                <a href="{{ url('/buku') }}" class="btn btn-outline-primary d-block">Pencarian Buku Lanjutan</a>
            </div>
            <div class="col-md-3 my-1">
                <a href="{{ url('/arsip') }}" class="btn btn-outline-primary d-block">Pencarian Arsip Lanjutan</a>
            </div>
        </div>
    </div>
@endsection
