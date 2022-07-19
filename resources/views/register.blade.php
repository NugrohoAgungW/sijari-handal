@extends('template')

@section('body')
    <div class="row mt-5">
        <div class="col-md-6">
            <img src="/img/arsip.jpg" alt="">
        </div>

        <div class="col-6 bg-white p-5 shadow d-block">

            <div class="container text-center pb-5">
                <h1>Register</h1>
            </div>

            <form method="post" action="/doregister">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button class="btn btn-primary"> Register </button>
                <div class="mt-5 py-3">
                    <p class="text-center">OR</p>
                    <div class="row">
                        <div class="col-md-6 my-1">
                            <a href="/login" class="btn btn-outline-primary d-block">
                                Login
                            </a>
                        </div>
                        <div class="col-md-6 my-1">
                            <a href="/auth/redirect" class="btn btn-outline-danger d-block">
                                <i class="bi bi-google"></i> Login with Google
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
