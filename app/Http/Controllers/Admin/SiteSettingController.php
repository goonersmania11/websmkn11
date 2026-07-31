<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    private const FIELD_SCHEMA = [
        'general' => [
            'site_name' => ['label' => 'Nama Sekolah', 'type' => 'text'],
            'short_name' => ['label' => 'Nama Pendek', 'type' => 'text'],
            'tagline' => ['label' => 'Tagline', 'type' => 'text'],
            'accreditation' => ['label' => 'Akreditasi', 'type' => 'text'],
            'service_hours' => ['label' => 'Jam Layanan', 'type' => 'text'],
            'phone' => ['label' => 'Telepon', 'type' => 'text'],
            'email' => ['label' => 'Email', 'type' => 'email'],
            'address' => ['label' => 'Alamat', 'type' => 'textarea'],
            'maps_embed_url' => ['label' => 'Google Maps Embed URL', 'type' => 'textarea'],
        ],
        'social' => [
            'facebook_url' => ['label' => 'Facebook URL', 'type' => 'url'],
            'instagram_url' => ['label' => 'Instagram URL', 'type' => 'url'],
            'youtube_url' => ['label' => 'YouTube URL', 'type' => 'url'],
        ],
        'hero' => [
            'hero_title' => ['label' => 'Judul Hero', 'type' => 'text'],
            'hero_subtitle' => ['label' => 'Subjudul Hero', 'type' => 'textarea'],
            'hero_cta_text' => ['label' => 'Teks Tombol Hero', 'type' => 'text'],
        ],
        'about' => [
            'home_about_title' => ['label' => 'Judul Tentang', 'type' => 'text'],
            'home_about_body' => ['label' => 'Isi Tentang', 'type' => 'textarea'],
        ],
        'principal' => [
            'principal_name' => ['label' => 'Nama Kepala Sekolah', 'type' => 'text'],
            'principal_position' => ['label' => 'Jabatan', 'type' => 'text'],
            'principal_welcome_title' => ['label' => 'Judul Sambutan', 'type' => 'text'],
            'principal_welcome_body' => ['label' => 'Isi Sambutan', 'type' => 'textarea'],
            'principal_quote' => ['label' => 'Kutipan', 'type' => 'text'],
        ],
        'footer' => [
            'footer_description' => ['label' => 'Deskripsi Footer', 'type' => 'textarea'],
        ],
        'spmb' => [
            'spmb_status' => ['label' => 'Status SPMB', 'type' => 'select', 'options' => ['dibuka' => 'Dibuka', 'ditutup' => 'Ditutup']],
            'spmb_title' => ['label' => 'Judul SPMB', 'type' => 'text'],
            'spmb_description' => ['label' => 'Deskripsi SPMB', 'type' => 'textarea'],
            'spmb_latest_info' => ['label' => 'Info Terbaru SPMB', 'type' => 'textarea'],
            'spmb_portal_url' => ['label' => 'URL Portal SPMB', 'type' => 'url'],
            'spmb_banner_title' => ['label' => 'Judul Banner SPMB', 'type' => 'text'],
            'spmb_banner_description' => ['label' => 'Deskripsi Banner SPMB', 'type' => 'textarea'],
        ],
        'page_heroes' => [
            'history_hero_title' => ['label' => 'Judul Hero Sejarah', 'type' => 'text'],
            'history_hero_subtitle' => ['label' => 'Subjudul Hero Sejarah', 'type' => 'text'],
            'vision_hero_title' => ['label' => 'Judul Hero Visi Misi', 'type' => 'text'],
            'vision_hero_subtitle' => ['label' => 'Subjudul Hero Visi Misi', 'type' => 'text'],
            'organization_hero_title' => ['label' => 'Judul Hero Struktur', 'type' => 'text'],
            'organization_hero_subtitle' => ['label' => 'Subjudul Hero Struktur', 'type' => 'text'],
            'programs_hero_title' => ['label' => 'Judul Hero Program', 'type' => 'text'],
            'programs_hero_subtitle' => ['label' => 'Subjudul Hero Program', 'type' => 'text'],
            'facilities_hero_title' => ['label' => 'Judul Hero Fasilitas', 'type' => 'text'],
            'facilities_hero_subtitle' => ['label' => 'Subjudul Hero Fasilitas', 'type' => 'text'],
            'achievements_hero_title' => ['label' => 'Judul Hero Prestasi', 'type' => 'text'],
            'achievements_hero_subtitle' => ['label' => 'Subjudul Hero Prestasi', 'type' => 'text'],
            'extracurriculars_hero_title' => ['label' => 'Judul Hero Eskul', 'type' => 'text'],
            'extracurriculars_hero_subtitle' => ['label' => 'Subjudul Hero Eskul', 'type' => 'text'],
            'gallery_hero_title' => ['label' => 'Judul Hero Galeri', 'type' => 'text'],
            'gallery_hero_subtitle' => ['label' => 'Subjudul Hero Galeri', 'type' => 'text'],
            'news_hero_title' => ['label' => 'Judul Hero Berita', 'type' => 'text'],
            'news_hero_subtitle' => ['label' => 'Subjudul Hero Berita', 'type' => 'text'],
            'faq_hero_title' => ['label' => 'Judul Hero FAQ', 'type' => 'text'],
            'faq_hero_subtitle' => ['label' => 'Subjudul Hero FAQ', 'type' => 'text'],
            'contact_hero_title' => ['label' => 'Judul Hero Kontak', 'type' => 'text'],
            'contact_hero_subtitle' => ['label' => 'Subjudul Hero Kontak', 'type' => 'text'],
            'spmb_hero_title' => ['label' => 'Judul Hero SPMB', 'type' => 'text'],
            'spmb_hero_subtitle' => ['label' => 'Subjudul Hero SPMB', 'type' => 'text'],
        ],
    ];

    public function edit()
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $schema = self::FIELD_SCHEMA;

        return view('admin.settings.edit', compact('settings', 'schema'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'settings' => 'required|array',
            'settings.*' => 'nullable|string|max:65000',
        ]);

        SiteSetting::setMany($validated['settings']);

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'Pengaturan berhasil disimpan.');
    }
}
