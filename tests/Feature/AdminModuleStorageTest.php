<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
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

    public function test_admin_can_store_content_items_with_duplicate_titles(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $data = [
            'type' => 'facility',
            'title' => 'Laboratorium Komputer',
            'is_published' => '1',
        ];

        $this->actingAs($admin)->post(route('admin.content-items.store'), $data)
            ->assertRedirect(route('admin.content-items.index', ['type' => 'facility']));

        $this->actingAs($admin)->post(route('admin.content-items.store'), $data)
            ->assertRedirect(route('admin.content-items.index', ['type' => 'facility']));

        $this->assertDatabaseHas('content_items', ['slug' => 'laboratorium-komputer']);
        $this->assertDatabaseHas('content_items', ['slug' => 'laboratorium-komputer-2']);
    }

    public function test_admin_resources_without_show_actions_do_not_register_show_routes(): void
    {
        foreach ([
            'admin.users.show',
            'admin.profiles.show',
            'admin.jurusans.show',
            'admin.pengumuman.show',
            'admin.agenda.show',
            'admin.content-items.show',
        ] as $routeName) {
            $this->assertFalse(Route::has($routeName));
        }
    }
}
