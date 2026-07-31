<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContentItem;
use App\Models\Guru;
use App\Models\Profile;
use App\Models\SiteSetting;

class ProfileController extends Controller
{
    public function history()
    {
        $profile = Profile::first();
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $milestones = ContentItem::type('history')->published()->ordered()->get();

        return view('pages.profile.history', compact('profile', 'settings', 'milestones'));
    }

    public function visionMission()
    {
        $profile = Profile::first();
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $missions = explode("\n", $profile->misi ?? '');
        $values = ContentItem::type('core_value')->published()->ordered()->get();

        return view('pages.profile.vision-mission', compact('profile', 'settings', 'missions', 'values'));
    }

    public function organization()
    {
        $profile = Profile::first();
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $principals = Guru::published()->where('jabatan', 'Kepala Sekolah')->get();
        $vicePrincipals = Guru::published()->where('jabatan', 'like', '%Wakil%')->ordered()->get();
        $departmentHeads = Guru::published()->where('jabatan', 'like', '%Kepala Program%')->ordered()->get();
        $gurus = Guru::published()->ordered()->get();

        return view('pages.profile.organization', compact(
            'profile',
            'settings',
            'principals',
            'vicePrincipals',
            'departmentHeads',
            'gurus',
        ));
    }
}
