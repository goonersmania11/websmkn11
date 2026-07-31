<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContentItem;
use App\Models\Jurusan;
use App\Models\Profile;
use App\Models\SiteSetting;

class AcademicController extends Controller
{
    public function programs()
    {
        $profile = Profile::first();
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $programs = Jurusan::published()->ordered()->get();

        return view('pages.academics.programs', compact('profile', 'settings', 'programs'));
    }

    public function programDetail(Jurusan $jurusan)
    {
        $profile = Profile::first();
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $program = $jurusan;

        return view('pages.academics.program-detail', compact('profile', 'settings', 'program'));
    }

    public function facilities()
    {
        $profile = Profile::first();
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $facilities = ContentItem::type('facility')->published()->ordered()->get();

        return view('pages.academics.facilities', compact('profile', 'settings', 'facilities'));
    }
}
