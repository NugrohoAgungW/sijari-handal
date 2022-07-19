<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    function login()
    {
        return view('login');
    }

    function dologin(Request $request)
    {
        //cek user
        $cek = Http::post('http://127.0.0.1:7000/api/user/dologin', [
            'email' => $request->email,
            'password' => $request->password,
        ])->json();

        //jika kosong
        if (empty($cek)) {
            return redirect('/login')->with('pesan', 'Gagal, email tidak terdaftar');
        } else {

            $request->session()->put('id', $cek['id']);
            $request->session()->put('name', $cek['name']);
            $request->session()->put('email', $cek['email']);
            $request->session()->put('avatar', $cek['avatar']);
            return redirect('/home')->with('pesan', 'Login Berhasil');
        }
    }

    function register()
    {
        return view('register');
    }

    function doregister(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'name' => 'required'
        ]);

        $cek = Http::post('http://127.0.0.1:7000/api/user/email', [
            'email' => $request->email,

        ])->json();



        if (empty($cek)) {
            $response = Http::post('http://127.0.0.1:7000/api/user/store', [
                'email' => $request->email,
                'password' => $request->password,
                'name' => $request->name
            ]);


            return redirect('/login')->with('pesan', 'Pendaftaran sukses silahkan login');
        } else {
            return redirect('/login')->with('pesan', 'Pendaftaran gagal, email sudah digunakan');
        }
    }

    function callback(Request $request)
    {
        $user = Socialite::driver('google')->stateless()->user();

        $cek = Http::post('http://127.0.0.1:7000/api/user/email', [
            'email' => $user->email,
        ])->json();


        //save image avatar

        if (empty($cek)) {
            file_put_contents("img/users/" . $user->name . ".jpg", file_get_contents($user->avatar));
            $response = Http::attach(
                "avatar",
                file_get_contents("img/users/" . $user->name . ".jpg"),
                "img/users/" . $user->name . ".jpg"
            )->post('http://127.0.0.1:7000/api/user/store', [
                'name' => $user->name,
                'email' => $user->email,
                'password' => "-",

            ]);
        } else {

            file_put_contents("img/users/" . $user->name . ".jpg", file_get_contents($user->avatar));
            $response = Http::attach(
                "avatar",
                file_get_contents("img/users/" . $user->name . ".jpg"),
                "img/users/" . $user->name . ".jpg"
            )->post('http://127.0.0.1:7000/api/user/' . $cek['id'] . '/update');
        }

        $cek = Http::post('http://127.0.0.1:7000/api/user/email', [
            'email' => $user->email
        ])->json();

        $request->session()->put('id', $cek['id']);
        $request->session()->put('name', $cek['name']);
        $request->session()->put('email', $cek['email']);
        $request->session()->put('avatar', $cek['avatar']);

        return redirect("/home");
    }

    function logout(Request $request)
    {
        $request->session()->forget(['id', 'name', 'email']);
        $request->session()->flush();
        return redirect('/home');
    }

    function user(Request $request)
    {
        $data['user'] = User::find($request->session()->get('id'));

        return view('user', $data);
    }

    function update_profil(Request $request)
    {
        $masuk['name'] = $request->name;
        if ($request->password) {
            $masuk['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            $masuk['avatar'] = $request->avatar->getClientOriginalName();
            $request->file('avatar')->move("img/users/", $masuk['avatar']);
        }

        $cek = Http::post('http://127.0.0.1:7000/api/user/email', [
            'email' => session('email')
        ])->json();

        $response = Http::attach(
            "avatar",
            file_get_contents("img/users/" . $masuk['avatar'] . ".jpg"),
            "img/users/" . $masuk['avatar'] . ".jpg"
        )->post('http://127.0.0.1:7000/api/user/' . $cek['id'] . '/update');

        $cek = Http::post('http://127.0.0.1:7000/api/user/email', [
            'email' => session('email')
        ])->json();

        $request->session()->put('id', $cek['id']);
        $request->session()->put('name', $cek['name']);
        $request->session()->put('email', $cek['email']);
        $request->session()->put('avatar', $cek['avatar']);


        return redirect('/home');
    }
}
