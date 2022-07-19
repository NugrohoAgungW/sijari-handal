<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FeedbackbukuController extends Controller
{
    //
    function store(Request $request, $id_buku)
    {
        $validated = $request->validate([
            'isi' => 'required',
        ]);

        $response = Http::post('http://127.0.0.1:7000/api/feedbackbuku/submit/' . $id_buku, [
            'user_id' => session('id'),
            'isi' => $request->isi,
        ]);

        return redirect('/buku/detail/' . $id_buku);
    }
}
