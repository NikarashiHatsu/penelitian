<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cms  $cms
     * @return \Illuminate\Http\Response
     */
    public function show(Cms $cms)
    {
        // return $cms;
        return view('berita.show', [
            'cms' => $cms,
        ]);
    }
}
