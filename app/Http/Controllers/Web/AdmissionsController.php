<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContentItem;
use App\Models\Profile;
use App\Models\SiteSetting;

class AdmissionsController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $requirements = ContentItem::type('spmb_requirement')->published()->ordered()->get();
        $schedules = ContentItem::type('spmb_schedule')->published()->ordered()->get();
        $flowSteps = ContentItem::type('spmb_flow')->published()->ordered()->get();
        $faqs = ContentItem::type('spmb_faq')->published()->ordered()->get();

        return view('pages.admissions', compact(
            'profile',
            'settings',
            'requirements',
            'schedules',
            'flowSteps',
            'faqs',
        ));
    }
}
