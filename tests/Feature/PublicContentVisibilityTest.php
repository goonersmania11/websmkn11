<?php

namespace Tests\Feature;

use App\Models\Berita;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Profile;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicContentVisibilityTest extends TestCase
{
    use RefreshDatabase;

    public function test_draft_news_cannot_be_accessed_from_public_url(): void
    {
        $author = User::factory()->create();
        $berita = Berita::create([
            'user_id' => $author->id,
            'judul' => 'Berita Draft',
            'slug' => 'berita-draft',
            'isi' => 'Konten belum diterbitkan.',
            'kategori' => 'Kegiatan',
            'status' => 'Draft',
        ]);

        $this->get(route('berita.show', $berita))->assertNotFound();
    }

    public function test_unpublished_program_cannot_be_accessed_from_public_url(): void
    {
        $jurusan = Jurusan::create([
            'nama' => 'Rekayasa Perangkat Lunak',
            'slug' => 'rekayasa-perangkat-lunak',
            'singkatan' => 'RPL',
            'deskripsi' => 'Program keahlian teknologi.',
            'visi' => 'Menjadi unggul.',
            'misi' => 'Belajar teknologi.',
            'is_published' => false,
        ]);

        $this->get(route('program.show', $jurusan))->assertNotFound();
    }

    public function test_published_teacher_detail_is_publicly_available(): void
    {
        $guru = Guru::create([
            'nama' => 'Budi Santoso',
            'nip' => '198001012006041001',
            'bidang_studi' => 'Matematika',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1980-01-01',
            'alamat' => 'Jakarta',
            'jabatan' => 'Guru',
            'jenis_kelamin' => 'Laki-laki',
            'is_published' => true,
        ]);

        $this->get(route('guru.show', $guru))
            ->assertOk()
            ->assertSee('Budi Santoso');
    }

    public function test_unpublished_teacher_detail_returns_not_found(): void
    {
        $guru = Guru::create([
            'nama' => 'Siti Aminah',
            'nip' => '198101012006042001',
            'bidang_studi' => 'Bahasa Indonesia',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '1981-01-01',
            'alamat' => 'Bandung',
            'jabatan' => 'Guru',
            'jenis_kelamin' => 'Perempuan',
            'is_published' => false,
        ]);

        $this->get(route('guru.show', $guru))->assertNotFound();
    }

    public function test_contact_page_displays_configured_service_hours(): void
    {
        Profile::create([
            'nama_sekolah' => 'SMKN 11',
            'alamat' => 'Jakarta',
            'sejarah' => 'Sejarah sekolah.',
            'visi' => 'Visi sekolah.',
            'misi' => 'Misi sekolah.',
            'sambutan_kepala_sekolah' => 'Sambutan kepala sekolah.',
        ]);
        SiteSetting::create([
            'key' => 'service_hours',
            'value' => '08.00 s.d. 15.30 WIB',
        ]);

        $this->get(route('contact.show'))
            ->assertOk()
            ->assertSee('08.00 s.d. 15.30 WIB');
    }
}
