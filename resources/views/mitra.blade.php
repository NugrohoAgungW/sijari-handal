@extends('template')

@section('body')
    <div class="container mt-3">
        <h1>Mitra</h1>
        <br>


        <div class="container">
            <div class="row mt-3">
                @foreach ($mitra as $key => $value)
                    <div class="col-md-3">

                        <img src="/img/mitra/{{ $value['logo'] }}" width="80%">
                        <h5>
                            <a href="{{ $value['url'] }}" target="_blank">{{ $value['nama'] }}</a>
                        </h5>


                    </div>
                @endforeach
            </div>


        </div>


    </div>
@endsection
