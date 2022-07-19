@extends('template')

@section('body')
    <div class="container">
        <form method="get" action="{{ url('buku/search') }}">
            @csrf
            @method('get')
            <div class="mb-3">
                <label for="">Judul Buku</label>
                <input type="text" name="judul" class="form-control" placeholder="Judul Buku..."
                    value="@if (isset($judul)) {{ $judul }} @endif" required>
            </div>
            <p>
                <a href="#tools" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="tools">
                    Filter
                </a>
            </p>
            <div class="collapse" id="tools">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="">Pengarang</label>
                        <input type="text" name="author" placeholder="pengarang" class="form-control"
                            value="@if (isset($author)) {{ $author }} @endif">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">Penerbit</label>
                        <input type="text" name="publisher" placeholder="penerbit" class="form-control"
                            value="@if (isset($publisher)) {{ $publisher }} @endif">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">Tahun</label>
                        <input type="text" name="tahun" placeholder="2005" class="form-control"
                            value="@if (isset($tahun)) {{ $tahun }} @endif">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary">Cari</button>
        </form>

        @if (isset($search))
            @if ($totalsearch == 0)
                <p class="text-muted large text-center">Pencarian Anda tidak cocok dengan dokumen apapun</p>
                <div class="d-flex justify-content-center">
                    <img src="/img/empty.png" alt="" width="50%">
                </div>
            @elseif($totalsearch >= 0)
                <p class="text-muted small text-center">Ditemukan {{ $totalsearch }} Hasil Pencarian
                    <strong>{{ $judul }}</strong>
                </p>

                @foreach ($search as $key => $value)
                    <div class="mb-3">
                        <div class="col md-8">
                            <h5>
                                <a href="{{ url('buku/detail/' . $value['id']) }}" target="_blank"
                                    class="text-decoration-none">
                                    {{ $value['judul'] }}
                                </a>
                            </h5>

                            <p>Penulis: {{ $value['author'] }}</p>

                            <a href="#more{{ $key }}" class="text-decoration-none" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="more{{ $key }}">
                                [more]
                            </a>
                            <a href="{{ url('buku/detail/' . $value['id']) }}" target="_blank"
                                class="text-decoration-none">[detail]</a>
                            <div class="collapse" id="more{{ $key }}">
                                <div class="card card-body">
                                    <table class="table">

                                        <tr>
                                            <th>tahun</th>
                                            <td>{{ $value['tahun'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>publisher</th>
                                            <td>{{ $value['publisher'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>koleksi</th>
                                            <td>{{ $value['koleksi'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>topik</th>
                                            <td>{{ $value['topik'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>institusi</th>
                                            <td>{{ $value['institusi'] }}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col md-4">

                        </div>
                    </div>
                @endforeach
            @endif


            <nav class="container mt-5">
                <ul class="pagination justify-content-center">
                    @foreach (range(1, $jumlahpage) as $key => $nomor)
                        @if ($nomor > $page - 3 && $nomor < $page + 5)
                            <li class="page-item">
                                <a href="/buku/search?judul={{ $judul }}&author={{ $author }}&publisher={{ $publisher }}&tahun={{ $tahun }}&page={{ $nomor }}"
                                    class="page-link">{{ $nomor }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
        @endif
    </div>

@endsection
