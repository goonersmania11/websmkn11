<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\ContentItem;
use App\Models\Profile;

class InformationController extends Controller
{
    public function news()
    {
        $profile = Profile::first();
        $beritas = Berita::latestPublished()->paginate(9);

        return view('pages.information.news', compact('profile', 'beritas'));
    }

    public function newsDetail(Berita $berita)
    {
        abort_unless($berita->status === 'Published', 404);

        $profile = Profile::first();
        $related = Berita::latestPublished()
            ->where('id', '!=', $berita->id)
            ->limit(3)
            ->get();

        return view('pages.information.news-detail', compact('profile', 'berita', 'related'));
    }

    public function faq()
    {
        $profile = Profile::first();
        $faqs = ContentItem::type('faq')->published()->ordered()->get();

        return view('pages.information.faq', compact('profile', 'faqs'));
    }
}
