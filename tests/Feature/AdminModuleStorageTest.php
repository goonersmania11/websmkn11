<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminModuleStorageTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_store_a_teacher(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->post(route('admin.gurus.store'), [
            'nama' => 'Siti Aminah',
            'nip' => '198001012006042001',
            'bidang_studi' => 'Matematika',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1980-01-01',
            'alamat' => 'Jakarta',
            'jabatan' => 'Guru',
            'jenis_kelamin' => 'Perempuan',
        ]);

        $response->assertRedirect(route('admin.gurus.index'));
        $this->assertDatabaseHas('gurus', [
            'nip' => '198001012006042001',
        ]);
    }

    public function test_berita_with_duplicate_slug_is_rejected_before_database_insert(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $data = [
            'judul' => 'Kegiatan Sekolah',
            'isi' => 'Isi berita.',
            'kategori' => 'Kegiatan',
            'status' => 'Draft',
        ];

        $this->actingAs($admin)->post(route('admin.berita.store'), $data)
            ->assertRedirect(route('admin.berita.index'));

        $this->actingAs($admin)->from(route('admin.berita.create'))
            ->post(route('admin.berita.store'), $data)
            ->assertRedirect(route('admin.berita.create'))
            ->assertSessionHasErrors('judul');

        $this->assertDatabaseCount('beritas', 1);
    }
}
