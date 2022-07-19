@extends('template')

@section('body')
    <div class="row mt-5">
        <div class="col-md-6">
            <img src="/img/arsip.jpg" alt="">
        </div>

        <div class="col-6 bg-white p-5 shadow d-block">

            <div class="container pb-5">
                <h1 class="text-center">Login</h1>
            </div>

            <form method="post" action="/dologin">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button class="btn btn-primary"> Login </button>
                <div class="mt-5 py-3">
                    <p class="text-center">OR</p>
                    <div class="row">
                        <div class="col-md-6 my-1">
                            <a href="/register" class="btn btn-outline-primary d-block">
                                Register
                            </a>
                        </div>
                        <div class="col-md-6 my-1">
                            <a href="/auth/redirect" class="btn btn-outline-danger d-block">
                                <i class="bi bi-google"></i> Google
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
