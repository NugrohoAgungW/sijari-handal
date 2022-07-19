<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class FeedbackarsipController extends Controller
{
    //
    function store(Request $request, $id_arsip)
    {
        $validated = $request->validate([
            'isi' => 'required',
        ]);

        $response = Http::post('http://127.0.0.1:7000/api/feedbackarsip/submit/' . $id_arsip, [
            'user_id' => session('id'),
            'isi' => $request->isi,
        ]);

        return redirect('/arsip/detail/' . $id_arsip);
    }
}
