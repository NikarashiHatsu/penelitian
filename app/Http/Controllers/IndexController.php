<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Models\Contact;
use App\Models\Gallery;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function landing_page(Request $request)
    {
        return view('landing-page', [
            // News
            'beritas' => Cms::where('feature', 'berita')->latest()->limit(6)->get(),

            // Galleries
            'gallery_description' => Gallery::where('type', 'Description')->first(),
            'galleries' => Gallery::where('type', 'Image')->latest()->limit(6)->get(),

            // Contacts
            'phones' => Contact::where('type', 'Phone')->get(),
            'addresses' => Contact::where('type', 'Address')->get(),

            // Social Medias
            'facebook' => null,
            'twitter' => null,
            'instagram' => null,
            'linkedIn' => null,
        ]);
    }
}
