<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Item;
use Illuminate\Support\Facades\Http;

class BukuController extends Controller
{
    function index()
    {
        return view('buku');
    }

    function cari(Request $request)
    {
        $kw = $request->keyword;
        $kw = urlencode(urlencode($kw));
        return redirect('/hasil/' . $kw);
    }

    function hasil($kw)
    {
        //disini minta data buku ke api sesuai keyword
        $response = Http::post('http://127.0.0.1:7000/api/buku/cari', [
            'keyword' => urldecode($kw),
            'page' => isset($_GET['page']) ? $_GET['page'] : 1,
        ]);
        $buku = $response->json();

        //disini minta data arsip ke api sesuai keyword
        $response = Http::post('http://127.0.0.1:7000/api/arsip/cari', [
            'keyword' => urldecode($kw),
            'page' => isset($_GET['page']) ? $_GET['page'] : 1,
        ]);
        $arsip = $response->json();

        //disini minta data buku ke api sesuai keyword untk pagination
        $response = Http::post('http://127.0.0.1:7000/api/buku/totalcari', [
            'keyword' => urldecode($kw),

        ]);
        $allbuku = $response->json();

        //disini minta data arsip ke api sesuai keyword untk pagination
        $response = Http::post('http://127.0.0.1:7000/api/arsip/totalcari', [
            'keyword' => urldecode($kw),

        ]);
        $allarsip = $response->json();

        $limit = 10;
        $totalbuku = count($allbuku);
        $totalarsip = count($allarsip);

        if ($totalbuku >= $totalarsip) {
            $jumlahpage = ceil($totalbuku / $limit);
        } else {
            $jumlahpage = ceil($totalarsip / $limit);
        }

        $bukus = array();
        $arsips = array();

        // if (count($buku) >= count($arsip)) {
        foreach ($buku as $key => $perbuku) {
            $perbuku['tipe'] = "buku";
            $perbuku['url'] = "buku/detail/" . $perbuku['id'];
            $bukus[] = $perbuku;
        }
        //         $hasil[] = $perbuku;
        //         if (isset($arsip[$key])) {
        //             $arsip[$key]['tipe'] = 'arsip';
        //             $arsip[$key]['url'] = 'arsip/detail/' . $arsip[$key]['id'];
        //             $hasil[] = $arsip[$key];
        //         }
        //     }
        // } else {
        foreach ($arsip as $key => $perarsip) {
            $perarsip['tipe'] = "arsip";
            $perarsip['url'] = "arsip/detail/" . $perarsip['id'];
            $arsips[] = $perarsip;
        }
        //         $hasil[] = $perarsip;
        //         if (isset($buku[$key])) {
        //             $buku[$key]['tipe'] = 'buku';
        //             $buku[$key]['url'] = 'buku/detail/' . $buku[$key]['id'];
        //             $hasil[] = $buku[$key];
        //         }
        //     }
        // }

        //jika hasilnya 0, maka masukkan sebagai waiting list
        if ($totalbuku == 0 || $totalarsip == 0) {
            $response = Http::post('http://127.0.0.1:7000/api/waiting', [
                'keyword' => urldecode($kw),
                'user_id' => session('id')
            ]);
        }

        $data['jumlahpage'] = $jumlahpage;
        $data['keyword'] = $kw;
        // $data['bukar'] = $hasil;
        $data['buku'] = $bukus;
        $data['arsip'] = $arsips;
        $data['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
        $data['totalbuku'] = $totalbuku;
        $data['totalarsip'] = $totalarsip;

        return view('hasil', $data);
    }

    function detail($id_buku)
    {
        $data['buku'] = Http::get('http://127.0.0.1:7000/api/buku/detail/' . $id_buku)->json();
        $data['feedback'] = Http::get('http://127.0.0.1:7000/api/feedbackbuku/list/' . $id_buku)->json();


        return view('buku_detail', $data);
    }

    function search(Request $request)
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 10;
        $totalsearch = count(Http::post('http://127.0.0.1:7000/api/buku/totalsearch', [
            'judul' => $request->judul,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'tahun' => $request->tahun,
        ])->json());
        $jumlahpage = ceil($totalsearch / $limit);

        $data['search'] = Http::post('http://127.0.0.1:7000/api/buku/search', [
            'judul' => $request->judul,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'tahun' => $request->tahun,
            'page' => $page,
        ])->json();

        $data['judul'] = $request->judul;
        $data['author'] = $request->author;
        $data['publisher'] = $request->publisher;
        $data['tahun'] = $request->tahun;
        $data['jumlahpage'] = $jumlahpage;
        $data['page'] = $page;
        $data['totalsearch'] = $totalsearch;

        return view('buku', $data);
    }
}
