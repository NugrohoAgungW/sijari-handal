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
                        value="{{ urldecode($keyword) }}">
                </div>
            </form>

            @if ($totalarsip == 0 && $totalbuku == 0)
                <p class="text-muted large text-center">Pencarian Anda tidak cocok dengan dokumen apapun</p>
                <div class="d-flex justify-content-center">
                    <img src="/img/empty.png" alt="" width="50%">
                </div>
            @elseif ($totalarsip == 0)
                <p class="text-muted small text-center">Ditemukan <strong>{{ $totalbuku }} Buku</strong> Hasil Pencarian
                    <strong>{{ $keyword }}</strong>
                </p>

                <div class="row">
                    <div class="col-md-10">

                        <h3>Buku</h3>
                        @foreach ($buku as $key => $value)
                            <div class="mb-3">
                                <div class="col md-8">
                                    <h5>
                                        <a href="/{{ $value['url'] }}" target="_blank" class="text-decoration-none">
                                            {{ isset($value['item_title']) ? $value['item_title'] : $value['judul'] }}
                                            [{{ $value['tipe'] }}]
                                        </a>
                                    </h5>
                                    @if (isset($value['author']))
                                        <p>Penulis: {{ $value['author'] }}</p>
                                    @endif
                                    <a href="#moreC{{ $key }}" class="text-decoration-none"
                                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                                        aria-controls="moreC{{ $key }}">
                                        [more]
                                    </a>
                                    <a href="/{{ $value['url'] }}" target="_blank"
                                        class="text-decoration-none">[detail]</a>
                                    <div class="collapse" id="moreC{{ $key }}">
                                        <div class="card card-body">
                                            <table class="table">
                                                @if ($value['tipe'] == 'buku')
                                                    <tr>
                                                        <th>Tahun</th>
                                                        <td>{{ $value['tahun'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Publisher</th>
                                                        <td>{{ $value['publisher'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Koleksi</th>
                                                        <td>{{ $value['koleksi'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Topik</th>
                                                        <td>{{ $value['topik'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Institusi</th>
                                                        <td>{{ $value['institusi'] }}</td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <th>File</th>
                                                        <td>{{ $value['file_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Subfile</th>
                                                        <td>{{ $value['subfile_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Berkas</th>
                                                        <td>{{ $value['berkas_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Subserie</th>
                                                        <td>{{ $value['subserie_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Serie</th>
                                                        <td>{{ $value['serie_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Subfond</th>
                                                        <td>{{ $value['subfond_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Fond</th>
                                                        <td>{{ $value['fond_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Reference Code</th>
                                                        <td>{{ $value['reference_code'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Archive Date</th>
                                                        <td>{{ $value['archive_date'] }}</td>
                                                    </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-2">
                        <div class="row-md-8 my-5">
                            <a href="{{ url('/buku') }}" class="btn btn-outline-primary d-block">Pencarian Buku
                                Lanjutan</a>
                        </div>
                        <div class="row-md-8">
                            <a href="{{ url('/arsip') }}" class="btn btn-outline-primary d-block">Pencarian Arsip
                                Lanjutan</a>
                        </div>
                    </div>
                </div>
            @elseif ($totalbuku == 0)
                <p class="text-muted small text-center">Ditemukan <strong>{{ $totalarsip }} Arsip</strong> Hasil
                    Pencarian <strong>{{ $keyword }}</strong>
                </p>

                <div class="row">
                    <div class="col-md-10">
                        <h3>Arsip</h3>

                        @foreach ($arsip as $key => $value)
                            <div class="mb-3">
                                <div class="col md-8">
                                    <h5>
                                        <a href="/{{ $value['url'] }}" target="_blank" class="text-decoration-none">
                                            {{ isset($value['item_title']) ? $value['item_title'] : $value['judul'] }}
                                            [{{ $value['tipe'] }}]
                                        </a>
                                    </h5>
                                    @if (isset($value['author']))
                                        <p>Penulis: {{ $value['author'] }}</p>
                                    @endif
                                    <a href="#moreD{{ $key }}" class="text-decoration-none" role="button"
                                        data-bs-toggle="collapse" data-bs-target="#moreD{{ $key }}"
                                        aria-controls="moreD{{ $key }}" aria-expanded="false">
                                        [more]
                                    </a>
                                    <a href="/{{ $value['url'] }}" target="_blank"
                                        class="text-decoration-none">[detail]</a>
                                    <div class="collapse" id="moreD{{ $key }}">
                                        <div class="card card-body">
                                            <table class="table">
                                                @if ($value['tipe'] == 'buku')
                                                    <tr>
                                                        <th>Tahun</th>
                                                        <td>{{ $value['tahun'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Publisher</th>
                                                        <td>{{ $value['publisher'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Koleksi</th>
                                                        <td>{{ $value['koleksi'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Topik</th>
                                                        <td>{{ $value['topik'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Institusi</th>
                                                        <td>{{ $value['institusi'] }}</td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <th>File</th>
                                                        <td>{{ $value['file_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Subfile</th>
                                                        <td>{{ $value['subfile_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Berkas</th>
                                                        <td>{{ $value['berkas_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Subserie</th>
                                                        <td>{{ $value['subserie_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Serie</th>
                                                        <td>{{ $value['serie_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Subfond</th>
                                                        <td>{{ $value['subfond_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Fond</th>
                                                        <td>{{ $value['fond_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Reference Code</th>
                                                        <td>{{ $value['reference_code'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Archive Date</th>
                                                        <td>{{ $value['archive_date'] }}</td>
                                                    </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>

                    <div class="col-md-2">
                        <div class="row-md-8 my-5">
                            <a href="{{ url('/buku') }}" class="btn btn-outline-primary d-block">Pencarian Buku
                                Lanjutan</a>
                        </div>
                        <div class="row-md-8">
                            <a href="{{ url('/arsip') }}" class="btn btn-outline-primary d-block">Pencarian Arsip
                                Lanjutan</a>
                        </div>
                    </div>
                </div>
            @else
                <p class="text-muted small text-center">Ditemukan <strong>{{ $totalarsip }} Arsip</strong> dan
                    <strong>{{ $totalbuku }} Buku</strong> Hasil Pencarian <strong>{{ $keyword }}</strong>
                </p>

                <div class="row">
                    <div class="col-md-10">
                        <h3>Arsip</h3>

                        @foreach ($arsip as $key => $value)
                            <div class="mb-3">
                                <div class="col md-8">
                                    <h5>
                                        <a href="/{{ $value['url'] }}" target="_blank" class="text-decoration-none">
                                            {{ isset($value['item_title']) ? $value['item_title'] : $value['judul'] }}
                                            [{{ $value['tipe'] }}]
                                        </a>
                                    </h5>
                                    @if (isset($value['author']))
                                        <p>Penulis: {{ $value['author'] }}</p>
                                    @endif
                                    <a href="#moreA{{ $key }}" class="text-decoration-none" role="button"
                                        data-bs-toggle="collapse" data-bs-target="#moreA{{ $key }}"
                                        aria-controls="moreA{{ $key }}" aria-expanded="false">
                                        [more]
                                    </a>
                                    <a href="/{{ $value['url'] }}" target="_blank"
                                        class="text-decoration-none">[detail]</a>
                                    <div class="collapse" id="moreA{{ $key }}">
                                        <div class="card card-body">
                                            <table class="table">
                                                @if ($value['tipe'] == 'buku')
                                                    <tr>
                                                        <th>Tahun</th>
                                                        <td>{{ $value['tahun'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Publisher</th>
                                                        <td>{{ $value['publisher'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Koleksi</th>
                                                        <td>{{ $value['koleksi'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Topik</th>
                                                        <td>{{ $value['topik'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Institusi</th>
                                                        <td>{{ $value['institusi'] }}</td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <th>File</th>
                                                        <td>{{ $value['file_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Subfile</th>
                                                        <td>{{ $value['subfile_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Berkas</th>
                                                        <td>{{ $value['berkas_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Subserie</th>
                                                        <td>{{ $value['subserie_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Serie</th>
                                                        <td>{{ $value['serie_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Subfond</th>
                                                        <td>{{ $value['subfond_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Fond</th>
                                                        <td>{{ $value['fond_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Reference Code</th>
                                                        <td>{{ $value['reference_code'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Archive Date</th>
                                                        <td>{{ $value['archive_date'] }}</td>
                                                    </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                        <hr>
                        <hr>

                        <h3>Buku</h3>
                        @foreach ($buku as $key => $value)
                            <div class="mb-3">
                                <div class="col md-8">
                                    <h5>
                                        <a href="/{{ $value['url'] }}" target="_blank" class="text-decoration-none">
                                            {{ isset($value['item_title']) ? $value['item_title'] : $value['judul'] }}
                                            [{{ $value['tipe'] }}]
                                        </a>
                                    </h5>
                                    @if (isset($value['author']))
                                        <p>Penulis: {{ $value['author'] }}</p>
                                    @endif
                                    <a href="#moreB{{ $key }}" class="text-decoration-none"
                                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                                        aria-controls="moreB{{ $key }}">
                                        [more]
                                    </a>
                                    <a href="/{{ $value['url'] }}" target="_blank"
                                        class="text-decoration-none">[detail]</a>
                                    <div class="collapse" id="moreB{{ $key }}">
                                        <div class="card card-body">
                                            <table class="table">
                                                @if ($value['tipe'] == 'buku')
                                                    <tr>
                                                        <th>Tahun</th>
                                                        <td>{{ $value['tahun'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Publisher</th>
                                                        <td>{{ $value['publisher'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Koleksi</th>
                                                        <td>{{ $value['koleksi'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Topik</th>
                                                        <td>{{ $value['topik'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Institusi</th>
                                                        <td>{{ $value['institusi'] }}</td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <th>File</th>
                                                        <td>{{ $value['file_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Subfile</th>
                                                        <td>{{ $value['subfile_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Berkas</th>
                                                        <td>{{ $value['berkas_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Subserie</th>
                                                        <td>{{ $value['subserie_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Serie</th>
                                                        <td>{{ $value['serie_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Subfond</th>
                                                        <td>{{ $value['subfond_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Fond</th>
                                                        <td>{{ $value['fond_title'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Reference Code</th>
                                                        <td>{{ $value['reference_code'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Archive Date</th>
                                                        <td>{{ $value['archive_date'] }}</td>
                                                    </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-2">
                        <div class="row-md-8 my-5">
                            <a href="{{ url('/buku') }}" class="btn btn-outline-primary d-block">Pencarian Buku
                                Lanjutan</a>
                        </div>
                        <div class="row-md-8">
                            <a href="{{ url('/arsip') }}" class="btn btn-outline-primary d-block">Pencarian Arsip
                                Lanjutan</a>
                        </div>
                    </div>
                </div>
            @endif

        </div>

        <nav class="container mt-5">
            <ul class="pagination justify-content-center">
                @foreach (range(1, $jumlahpage) as $key => $nomor)
                    @if ($nomor > $page - 3 && $nomor < $page + 5)
                        <li class="page-item">
                            <a href="/hasil/{{ $keyword }}?page={{ $nomor }}"
                                class="page-link">{{ $nomor }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>

@endsection
