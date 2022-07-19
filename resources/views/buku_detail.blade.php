@extends('template')

@section('body')

    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h5>{{ $buku['judul'] }}</h5>
                <table class="table">
                    <tr>
                        <th>tahun</th>
                        <td>{{ $buku['tahun'] }}</td>
                    </tr>
                    <tr>
                        <th>publisher</th>
                        <td>{{ $buku['publisher'] }}</td>
                    </tr>
                    <tr>
                        <th>koleksi</th>
                        <td>{{ $buku['koleksi'] }}</td>
                    </tr>
                    <tr>
                        <th>topik</th>
                        <td>{{ $buku['topik'] }}</td>
                    </tr>
                    <tr>
                        <th>institusi</th>
                        <td>{{ $buku['institusi'] }}</td>
                    </tr>
                    <tr>
                        <th>Online Access</th>
                        <td><a href="{{ $buku['url'] }}" target="_blank">{{ $buku['url'] }}</a></td>
                    </tr>

                </table>

                <h6>{{ count($feedback) }} Feedback</h6>
                @if (session('id'))
                    <form action="/feedback/buku/store/{{ $buku['id'] }}" method="POST" class="mb-3">
                        @csrf
                        @method('post')
                        <div class="mb-3 row">
                            <div class="col-md-1 mb-3">
                                @if (session('avatar'))
                                    <img src="/img/users/{{ session('avatar') }}" alt="" width="32"
                                        class="rounded-circle mt-1">
                                @else
                                    <img src="{{ Avatar::create(session('name'))->toBase64() }}" alt=""
                                        width="32" class=" mt-1">
                                @endif
                            </div>
                            <div class="col-md-11 mb-3">
                                <textarea name="isi" class="form-control mb-2"></textarea>
                                @error('isi')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                                <button class="btn btn-primary ms-auto">Kirim</button>
                            </div>
                        </div>
                    </form>
                @endif

                @if (!session('id'))
                    <a href="/login" class="text-decoration-none">
                        <textarea class="form-control" readonly placeholder="Berikan Feedback Anda"></textarea>
                    </a>
                @endif

                @foreach ($feedback as $key => $value)
                    <div class="mb-3 row">
                        <div class="col-md-1 mb-3">
                            @if ($value['avatar'])
                                <img src="http://127.0.0.1:7000/img/users/{{ $value['avatar'] }}" alt=""
                                    width="32" class="rounded-circle mt-1">
                            @else
                                <img src="{{ Avatar::create($value['name'])->toBase64() }}" alt="" width="32"
                                    class=" mt-1">
                            @endif
                        </div>
                        <div class="col-md-11 mb-3">
                            <p class="my-0"><strong>{{ $value['name'] }}</strong>
                                {{ date('d F Y', strtotime($value['created_at'])) }}</p>
                            <p class="text-muted">{{ $value['isi'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="/bootstrap/js/bootstrap.bundle.js"></script>
@endsection
