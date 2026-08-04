<?php

namespace Tests\Feature;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Tests\TestCase;

class GuruImportExportTest extends TestCase
{
    use RefreshDatabase;

    private function makeXlsx(array $rows): UploadedFile
    {
        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray([
            ['Nama', 'NIP', 'Bidang Studi', 'Jabatan', 'Tempat Lahir', 'Tanggal Lahir', 'Alamat', 'Social Media', 'Jenis Kelamin'],
        ], null, 'A1');

        foreach ($rows as $index => $row) {
            $sheet->fromArray(array_values($row), null, 'A'.($index + 2));
        }

        $path = tempnam(sys_get_temp_dir(), 'test_guru_').'.xlsx';
        (new Xlsx($spreadsheet))->save($path);

        return new UploadedFile($path, 'guru.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', null, true);
    }

    private function row(array $overrides = []): array
    {
        return array_merge([
            'Nama' => 'Budi Santoso',
            'NIP' => '197501012005011001',
            'Bidang Studi' => 'Matematika',
            'Jabatan' => 'Guru Produktif',
            'Tempat Lahir' => 'Semarang',
            'Tanggal Lahir' => '1975-01-01',
            'Alamat' => 'Jl. Contoh No. 1',
            'Social Media' => '@budisantoso',
            'Jenis Kelamin' => 'Laki-laki',
        ], $overrides);
    }

    public function test_admin_can_preview_then_import_valid_xlsx(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $file = $this->makeXlsx([$this->row(), $this->row([
            'Nama' => 'Siti Aminah',
            'NIP' => '198001012006042001',
            'Jenis Kelamin' => 'Perempuan',
        ])]);

        $preview = $this->actingAs($admin)->post(route('admin.gurus.import.preview'), ['file' => $file]);
        $preview->assertOk()->assertViewHas('preview');
        $this->assertEquals(2, $preview->viewData('preview')['total']);

        $token = $preview->viewData('token');

        $this->actingAs($admin)->post(route('admin.gurus.import'), ['file_token' => $token])
            ->assertRedirect(route('admin.gurus.index'))
            ->assertSessionHas('import_result');

        $this->assertDatabaseHas('gurus', ['nip' => '197501012005011001', 'is_published' => true]);
        $this->assertDatabaseHas('gurus', ['nip' => '198001012006042001', 'is_published' => true]);

        $first = Guru::where('nip', '197501012005011001')->first();
        $this->assertEquals(1, $first->sort_order);
        $this->assertNull($first->jurusan_id);
    }

    public function test_duplicate_nip_in_file_is_skipped_and_reported(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        Guru::factory()->create(['nip' => '197501012005011001']);

        $file = $this->makeXlsx([
            $this->row(),
            $this->row(['Nama' => 'Orang Lain']),
        ]);

        $preview = $this->actingAs($admin)->post(route('admin.gurus.import.preview'), ['file' => $file]);
        $token = $preview->viewData('token');

        $this->actingAs($admin)->post(route('admin.gurus.import'), ['file_token' => $token]);

        $this->assertDatabaseCount('gurus', 1);
        $this->assertDatabaseMissing('gurus', ['nama' => 'Orang Lain']);
    }

    public function test_invalid_row_is_skipped_and_reported(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $file = $this->makeXlsx([
            $this->row(),
            $this->row([
                'Nama' => '',
                'NIP' => '199001012010011001',
                'Jenis Kelamin' => 'Tidak Valid',
                'Tanggal Lahir' => 'bukan-tanggal',
            ]),
        ]);

        $preview = $this->actingAs($admin)->post(route('admin.gurus.import.preview'), ['file' => $file]);
        $token = $preview->viewData('token');

        $response = $this->actingAs($admin)->post(route('admin.gurus.import'), ['file_token' => $token]);
        $response->assertSessionHas('import_result');

        $this->assertDatabaseCount('gurus', 1);

        $result = session('import_result');
        $this->assertEquals(1, $result['success']);
        $this->assertCount(1, $result['errors']);
        $this->assertEquals(3, $result['errors'][0]['row']);
        $this->assertArrayHasKey('Nama', $result['errors'][0]['errors']);
        $this->assertArrayHasKey('Jenis Kelamin', $result['errors'][0]['errors']);
        $this->assertArrayHasKey('Tanggal Lahir', $result['errors'][0]['errors']);
    }

    public function test_admin_can_download_template(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)->get(route('admin.gurus.import.template'))
            ->assertOk()
            ->assertHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }

    public function test_admin_can_export_gurus(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        Guru::factory()->create([
            'nama' => 'Budi Santoso',
            'nip' => '197501012005011001',
        ]);

        $this->actingAs($admin)->get(route('admin.gurus.export'))
            ->assertOk()
            ->assertHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }

    public function test_import_requires_admin_auth(): void
    {
        $this->get(route('admin.gurus.import.template'))->assertRedirect(route('login'));

        $user = User::factory()->create(['role' => 'guru']);
        $this->actingAs($user)->get(route('admin.gurus.export'))->assertForbidden();
    }
}
