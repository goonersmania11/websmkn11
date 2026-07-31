<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContentItem;
use App\Models\Prestasi;
use App\Models\Profile;
use App\Models\SiteSetting;

class StudentController extends Controller
{
    public function achievements()
    {
        $profile = Profile::first();
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $achievements = Prestasi::published()->latest()->get();

        return view('pages.student.achievements', compact('profile', 'settings', 'achievements'));
    }

    public function extracurriculars()
    {
        $profile = Profile::first();
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $extracurriculars = ContentItem::type('extracurricular')->published()->ordered()->get();

        return view('pages.student.extracurriculars', compact('profile', 'settings', 'extracurriculars'));
    }

    public function gallery()
    {
        $profile = Profile::first();
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $galleryItems = ContentItem::type('gallery')->published()->ordered()->get();

        return view('pages.student.gallery', compact('profile', 'settings', 'galleryItems'));
    }
}
