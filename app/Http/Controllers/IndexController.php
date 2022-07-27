<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Models\Contact;
use App\Models\Focus;
use App\Models\Footer;
use App\Models\Gallery;
use App\Models\Hero;
use App\Models\SkemaPenelitian;
use App\Models\VisionMission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function landing_page(Request $request)
    {
        return view('landing-page', [
            // Hero
            'hero_title' => Hero::where('type', 'Judul')->first()->content,
            'hero_description' => Hero::where('type', 'Deskripsi')->first()->content,
            'hero_image' => Storage::url(Hero::where('type', 'Gambar')->first()->content),
            'hero_logos' => Hero::where('type', 'Logo')->orderByDesc('created_at')->get()->map(function($logo) {
                $logo->content = Storage::url($logo->content);
                return $logo;
            }),

            // Skema Penelitian
            'skema_penelitians' => SkemaPenelitian::all(),

            // Fokus Penelitian
            'fokus_penelitians' => Focus::all(),

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
            'footer_logo' => Footer::where('type', 'Logo')->first()->file,
            'footer_small_logos' => Footer::where('type', 'Logo Kecil')->orderByDesc('created_at')->get(),
            'footer_content' => Footer::where('type', 'Description')->first()->content,
            'facebook' =>  strip_tags(Footer::where('type', 'Facebook')->first()->content),
            'twitter' =>  strip_tags(Footer::where('type', 'Twitter')->first()->content),
            'instagram' =>  strip_tags(Footer::where('type', 'Instagram')->first()->content),
            'linkedIn' =>  strip_tags(Footer::where('type', 'LinkedIn')->first()->content),
        ]);
    }
}
