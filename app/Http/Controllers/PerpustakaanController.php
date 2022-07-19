<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    function index()
    {
        $data['mitra'] = Http::get('http://127.0.0.1:7000/api/mitra')->json();


        return view('mitra', $data);
    }
}
