<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Http;

class ArsipController extends Controller
{
    //

    function index()
    {
        return view('arsip');
    }

    function detail($id_arsip)
    {
        $data['arsip'] = Http::get('http://127.0.0.1:7000/api/arsip/detail/' . $id_arsip)->json();
        $data['feedback'] = Http::get('http://127.0.0.1:7000/api/feedbackarsip/list/' . $id_arsip)->json();

        return view('arsip_detail', $data);
    }

    function search(Request $request)
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 10;
        $totalsearch = count(Http::post('http://127.0.0.1:7000/api/arsip/totalsearch', [
            'title' => $request->title,
            'tahun' => $request->tahun,
        ])->json());
        $jumlahpage = ceil($totalsearch / $limit);

        $data['search'] = Http::post('http://127.0.0.1:7000/api/arsip/search', [
            'title' => $request->title,
            'tahun' => $request->tahun,
            'page' => $page
        ])->json();

        $data['title'] = $request->title;
        $data['tahun'] = $request->tahun;
        $data['jumlahpage'] = $jumlahpage;
        $data['page'] = $page;
        $data['totalsearch'] = $totalsearch;

        // dd($data);
        return view('arsip', $data);
    }
}
