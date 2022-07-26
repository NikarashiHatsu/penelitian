<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Models\Contact;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function landing_page(Request $request)
    {
        return view('landing-page', [
            'beritas' => Cms::where('feature', 'berita')->latest()->limit(6)->get(),

            'phones' => Contact::where('type', 'Phone')->get(),
            'addresses' => Contact::where('type', 'Address')->get(),

            'facebook' => null,
            'twitter' => null,
            'instagram' => null,
            'linkedIn' => null,
        ]);
    }
}
