<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AboutController extends Controller
{
    function index()
    {
        $arsip = Http::get('http://127.0.0.1:7000/api/arsip/list')->json();
        $buku = Http::get('http://127.0.0.1:7000/api/buku/list')->json();

        $totalarsip = count($arsip);
        $totalbuku = count($buku);

        $data['arsip'] = $totalarsip;
        $data['buku'] = $totalbuku;

        return view('about', $data);
    }
}
