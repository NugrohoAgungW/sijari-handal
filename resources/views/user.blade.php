@extends('template')

@section('body')
    <div class="container py-5">
        <div class="mt-5">
            <form method="POST" action="/update_profil">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="{{$user->email}}" readonly>
                </div>
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}" >
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                    <p class="small text-danger">Kosongkan jika password tidak diubah</p>
                </div>
                <div class="mb-3">
                    <label>Avatar Lama</label> <br>
                    <img src="/img/users/{{$user->avatar}}" width="100" class="py-2">
                </div>
                <div class="mb-3">
                    <label>Avatar</label>
                    <input type="file" class="form-control" name="avatar" >
                </div>
                <button class="btn btn-primary">Ubah</button>
            </form>
        </div>
    </div>
@endsection
