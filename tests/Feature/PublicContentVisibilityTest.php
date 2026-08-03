<?php

namespace Tests\Feature;

use App\Models\Berita;
use App\Models\Jurusan;
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
}
