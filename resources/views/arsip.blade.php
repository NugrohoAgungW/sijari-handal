@extends('template')

@section('body')
    <div class="container">
        <form method="get" action="{{ url('arsip/search') }}">
            @csrf
            @method('get')
            <div class="mb-3">
                <label for="">Judul Arsip</label>
                <input type="text" name="title" class="form-control" placeholder="Cari Arsip..."
                    value="@if (isset($title)) {{ $title }} @endif" required>
            </div>
            <p>
                <a href="#tools" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="tools">
                    Filter
                </a>
            </p>
            <div class="collapse" id="tools">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="">Tahun Arsip</label>
                        <input type="text" name="tahun" placeholder="1997" class="form-control"
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
                    <strong>{{ $title }}</strong>
                </p>

                @foreach ($search as $key => $value)
                    <div class="mb-3">
                        <div class="col md-8">
                            <h5>
                                <a href="{{ url('arsip/detail/' . $value['id']) }}" target="_blank"
                                    class="text-decoration-none">
                                    {{ $value['item_title'] }}
                                </a>
                            </h5>

                            <a href="#more{{ $key }}" class="text-decoration-none" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="more{{ $key }}">
                                [more]
                            </a>
                            <a href="{{ url('arsip/detail/' . $value['id']) }}" target="_blank"
                                class="text-decoration-none">[detail]</a>
                            <div class="collapse" id="more{{ $key }}">
                                <div class="card card-body">
                                    <table class="table">
                                        <tr>
                                            <th>file_title</th>
                                            <td>{{ $value['file_title'] }}</td>
                                        </tr>

                                        <tr>
                                            <th>subfile_title</th>
                                            <td>{{ $value['subfile_title'] }}</td>
                                        </tr>

                                        <tr>
                                            <th>berkas_title</th>
                                            <td>{{ $value['berkas_title'] }}</td>
                                        </tr>

                                        <tr>
                                            <th>subserie_title</th>
                                            <td>{{ $value['subserie_title'] }}</td>
                                        </tr>

                                        <tr>
                                            <th>serie_title</th>
                                            <td>{{ $value['serie_title'] }}</td>
                                        </tr>

                                        <tr>
                                            <th>subfond_title</th>
                                            <td>{{ $value['subfond_title'] }}</td>
                                        </tr>

                                        <tr>
                                            <th>fond_title</th>
                                            <td>{{ $value['fond_title'] }}</td>
                                        </tr>

                                        <tr>
                                            <th>reference_code</th>
                                            <td>{{ $value['reference_code'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>archive_date</th>
                                            <td>{{ $value['archive_date'] }}</td>
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
                                <a href="/arsip/search?title={{ $title }}&tahun={{ $tahun }}&page={{ $nomor }}"
                                    class="page-link">{{ $nomor }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
        @endif
    </div>

@endsection
