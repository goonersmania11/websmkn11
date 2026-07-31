<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\ContentItem;
use App\Models\Jurusan;
use App\Models\Prestasi;
use App\Models\Profile;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $jurusans = Jurusan::published()->ordered()->get();
        $beritas = Berita::latestPublished()->limit(6)->get();
        $prestasis = Prestasi::published()->latest()->limit(6)->get();
        $statistics = ContentItem::type('statistic')->published()->ordered()->get();
        $homeSlides = ContentItem::type('home_slide')->published()->ordered()->get();

        return view('pages.home', compact(
            'profile',
            'settings',
            'jurusans',
            'beritas',
            'prestasis',
            'statistics',
            'homeSlides',
        ));
    }
}
