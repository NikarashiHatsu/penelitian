<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Models\Contact;
use App\Models\Footer;
use App\Models\Gallery;
use App\Models\Hero;
use App\Models\VisionMission;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function landing_page(Request $request)
    {
        return view('landing-page', [
            // Hero
            'hero_title' => Hero::where('type', 'Judul')->first()->content,
            'hero_description' => Hero::where('type', 'Deskripsi')->first()->content,

            // Visi Misi Tujuan
            'vision' => VisionMission::where('type', 'vision')->first()->description,
            'mission' => VisionMission::where('type', 'mission')->first()->description,
            'target' => VisionMission::where('type', 'target')->first()->description,

            // News
            'beritas' => Cms::where('feature', 'berita')->latest()->limit(6)->get(),

            // Galleries
            'gallery_description' => Gallery::where('type', 'Description')->first(),
            'galleries' => Gallery::where('type', 'Image')->latest()->limit(6)->get(),

            // Contacts
            'phones' => Contact::where('type', 'Phone')->get(),
            'addresses' => Contact::where('type', 'Address')->get(),

            // Social Medias
            'footer_content' => Footer::where('type', 'Description')->first()->content,
            'facebook' =>  Footer::where('type', 'Facebook')->first()->content,
            'twitter' =>  Footer::where('type', 'Twitter')->first()->content,
            'instagram' =>  Footer::where('type', 'Instagram')->first()->content,
            'linkedIn' =>  Footer::where('type', 'LinkedIn')->first()->content,
        ]);
    }
}
