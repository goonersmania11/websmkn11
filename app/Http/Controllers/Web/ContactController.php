<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Profile;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        $profile = Profile::first();
        $settings = SiteSetting::pluck('value', 'key')->toArray();

        return view('pages.contact', compact('profile', 'settings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', SiteSetting::getValue('contact_success_message', 'Pesan berhasil dikirim!'));
    }
}
