<?php

namespace App\Services;

use App\Models\Guru;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class GuruExcelService
{
    /**
     * Kolom pada file Excel, urutan wajib mengikuti posisi sel (kolom A, B, C, ...).
     */
    public const HEADERS = [
        'Nama',
        'NIP',
        'Bidang Studi',
        'Jabatan',
        'Tempat Lahir',
        'Tanggal Lahir',
        'Alamat',
        'Social Media',
        'Jenis Kelamin',
    ];

    /**
     * Kolom yang wajib diisi.
     */
    public const REQUIRED = [
        'Nama',
        'NIP',
        'Bidang Studi',
        'Jabatan',
        'Tempat Lahir',
        'Tanggal Lahir',
    ];

    /**
     * Map index kolom (0-based) ke key field model.
     */
    private const COLUMN_MAP = [
        'Nama' => 'nama',
        'NIP' => 'nip',
        'Bidang Studi' => 'bidang_studi',
        'Jabatan' => 'jabatan',
        'Tempat Lahir' => 'tempat_lahir',
        'Tanggal Lahir' => 'tanggal_lahir',
        'Alamat' => 'alamat',
        'Social Media' => 'social_media',
        'Jenis Kelamin' => 'jenis_kelamin',
    ];

    /**
     * Format tanggal yang didukung saat auto-detect.
     */
    private const DATE_FORMATS = [
        'Y-m-d',
        'Y/m/d',
        'd-m-Y',
        'd/m/Y',
        'm/d/Y',
        'd.m.Y',
        'Y.M.d',
        'd M Y',
        'd M, Y',
    ];

    /**
     * Baca isi sheet menjadi array baris data (baris header di-skip).
     * Setiap baris direpresentasikan sebagai array key => value dengan key sesuai HEADERS.
     */
    private function readRows(string $path): array
    {
        $spreadsheet = IOFactory::load($path);
        $sheet = $spreadsheet->getActiveSheet();
        $highestRow = $sheet->getHighestDataRow();

        $rows = [];

        // Baris 1 = header, lewati.
        for ($row = 2; $row <= $highestRow; $row++) {
            $data = [];
            foreach (self::COLUMN_MAP as $header => $field) {
                $data[$header] = $sheet->getCell(self::columnIndex($header).$row)->getValue();
            }
            $rows[] = $data;
        }

        return $rows;
    }

    /**
     * Konversi indeks kolom (0-based) ke string huruf Excel (A, B, ...).
     */
    private static function columnIndex(string $header): string
    {
        $col = array_search($header, self::HEADERS, true);

        return Coordinate::stringFromColumnIndex($col + 1);
    }

    /**
     * Parse tanggal dari nilai sel. Mendukung serial number Excel dan beragam format string.
     */
    private function parseDate(mixed $value): ?Carbon
    {
        if (empty($value)) {
            return null;
        }

        // Excel menyimpan tanggal sebagai serial number (float).
        if (is_numeric($value)) {
            try {
                return Carbon::instance(Date::excelToDateTimeObject((float) $value));
            } catch (\Throwable) {
                return null;
            }
        }

        $value = (string) $value;

        foreach (self::DATE_FORMATS as $format) {
            try {
                return Carbon::createFromFormat($format, $value);
            } catch (\Throwable) {
                continue;
            }
        }

        // Fallback ke pengenalan Carbon yang lebih longgar.
        try {
            return Carbon::parse($value);
        } catch (\Throwable) {
            return null;
        }
    }

    /**
     * Validasi satu baris data. Mengembalikan list error [field => message] atau kosong jika valid.
     */
    private function validateRow(array $row): array
    {
        $errors = [];

        foreach (self::REQUIRED as $header) {
            if (empty(trim((string) ($row[$header] ?? ''))) && $row[$header] !== 0 && $row[$header] !== '0') {
                $errors[$header] = 'Kolom '.$header.' wajib diisi.';
            }
        }

        if (! empty($row['Nama']) && strlen((string) $row['Nama']) > 255) {
            $errors['Nama'] = 'Nama maksimal 255 karakter.';
        }

        if (! empty($row['NIP']) && strlen((string) $row['NIP']) > 50) {
            $errors['NIP'] = 'NIP maksimal 50 karakter.';
        }

        if (! empty($row['Bidang Studi']) && strlen((string) $row['Bidang Studi']) > 255) {
            $errors['Bidang Studi'] = 'Bidang Studi maksimal 255 karakter.';
        }

        if (! empty($row['Jabatan']) && strlen((string) $row['Jabatan']) > 255) {
            $errors['Jabatan'] = 'Jabatan maksimal 255 karakter.';
        }

        if (! empty($row['Tempat Lahir']) && strlen((string) $row['Tempat Lahir']) > 255) {
            $errors['Tempat Lahir'] = 'Tempat Lahir maksimal 255 karakter.';
        }

        if (! empty($row['Social Media']) && strlen((string) $row['Social Media']) > 255) {
            $errors['Social Media'] = 'Social Media maksimal 255 karakter.';
        }

        if (! empty($row['Jenis Kelamin']) && ! in_array($row['Jenis Kelamin'], ['Laki-laki', 'Perempuan'], true)) {
            $errors['Jenis Kelamin'] = 'Jenis Kelamin hanya boleh "Laki-laki" atau "Perempuan".';
        }

        // Validasi tanggal lahir.
        $tanggalLahir = $this->parseDate($row['Tanggal Lahir'] ?? null);
        if (! empty($row['Tanggal Lahir']) && $tanggalLahir === null) {
            $errors['Tanggal Lahir'] = 'Format Tanggal Lahir tidak valid.';
        }

        return $errors;
    }

    /**
     * Ubah array baris menjadi data siap simpan ke model Guru.
     */
    private function mapToData(array $row): array
    {
        $data = [];

        foreach (self::COLUMN_MAP as $header => $field) {
            $value = $row[$header] ?? null;

            if ($field === 'tanggal_lahir') {
                $parsed = $this->parseDate($value);
                $data[$field] = $parsed?->toDateString();

                continue;
            }

            $data[$field] = trim((string) $value) === '' ? null : trim((string) $value);
        }

        return $data;
    }

    /**
     * Baca file untuk keperluan preview. Mengembalikan 10 baris pertama + total baris.
     */
    public function preview(string $path): array
    {
        $rows = $this->readRows($path);

        // Hapus baris yang seluruh kolomnya kosong.
        $rows = array_values(array_filter($rows, fn ($row) => array_filter($row, fn ($v) => $v !== null && trim((string) $v) !== '')));

        return [
            'total' => count($rows),
            'rows' => array_slice($rows, 0, 10),
        ];
    }

    /**
     * Proses import. Mengembalikan ['success' => int, 'errors' => array].
     */
    public function import(string $path): array
    {
        $rows = $this->readRows($path);
        $errors = [];
        $success = 0;
        $processedNips = [];
        $sortOrder = 1;

        foreach ($rows as $index => $row) {
            $rowNumber = $index + 2; // +1 karena index 0, +1 karena baris 1 adalah header.
            $validations = $this->validateRow($row);

            $nip = trim((string) ($row['NIP'] ?? ''));

            // Cek duplikat NIP dalam file maupun database.
            if (empty($validations['NIP']) && $nip !== '') {
                if (isset($processedNips[strtolower($nip)])) {
                    $validations['NIP'] = 'NIP duplikat di dalam file.';
                } elseif (Guru::where('nip', $nip)->exists()) {
                    $validations['NIP'] = 'NIP sudah terdaftar di database.';
                }

                if (empty($validations['NIP'])) {
                    $processedNips[strtolower($nip)] = true;
                }
            }

            if (! empty($validations)) {
                $errors[] = [
                    'row' => $rowNumber,
                    'nama' => $row['Nama'] ?? '',
                    'nip' => $nip,
                    'errors' => $validations,
                ];

                continue;
            }

            $data = $this->mapToData($row);
            $data['jurusan_id'] = null;
            $data['is_published'] = true;
            $data['sort_order'] = $sortOrder++;

            Guru::create($data);
            $success++;
        }

        return [
            'success' => $success,
            'errors' => $errors,
        ];
    }

    /**
     * Buat file template Excel kosong (berisi header + contoh 1 baris).
     */
    public function template(): BinaryFileResponse
    {
        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();

        foreach (self::HEADERS as $index => $header) {
            $cell = Coordinate::stringFromColumnIndex($index + 1).'1';
            $sheet->setCellValue($cell, $header);
            $sheet->getStyle($cell)->getFont()->setBold(true);
        }

        $example = [
            'Nama' => 'Budi Santoso',
            'NIP' => '197501012005011001',
            'Bidang Studi' => 'Matematika',
            'Jabatan' => 'Guru Produktif',
            'Tempat Lahir' => 'Semarang',
            'Tanggal Lahir' => '01-01-1975',
            'Alamat' => 'Jl. Contoh No. 1',
            'Social Media' => '@budisantoso',
            'Jenis Kelamin' => 'Laki-laki',
        ];

        foreach (self::HEADERS as $index => $header) {
            $cell = Coordinate::stringFromColumnIndex($index + 1).'2';
            $sheet->setCellValue($cell, $example[$header] ?? '');
        }

        foreach (range('A', 'I') as $letter) {
            $sheet->getColumnDimension($letter)->setAutoSize(true);
        }

        return $this->download($spreadsheet, 'template_import_guru.xlsx');
    }

    /**
     * Export seluruh data guru ke file Excel (tanpa kolom foto).
     */
    public function export(): BinaryFileResponse
    {
        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();

        foreach (self::HEADERS as $index => $header) {
            $cell = Coordinate::stringFromColumnIndex($index + 1).'1';
            $sheet->setCellValue($cell, $header);
            $sheet->getStyle($cell)->getFont()->setBold(true);
        }

        $gurus = Guru::query()->orderBy('sort_order')->orderBy('nama')->get();
        $rowIndex = 2;

        foreach ($gurus as $guru) {
            $sheet->fromArray([
                $guru->nama,
                $guru->nip,
                $guru->bidang_studi,
                $guru->jabatan,
                $guru->tempat_lahir,
                $guru->tanggal_lahir?->format('d-m-Y'),
                $guru->alamat,
                $guru->social_media,
                $guru->jenis_kelamin,
            ], null, Coordinate::stringFromColumnIndex(1).$rowIndex);

            $rowIndex++;
        }

        foreach (range('A', 'I') as $letter) {
            $sheet->getColumnDimension($letter)->setAutoSize(true);
        }

        return $this->download($spreadsheet, 'export_data_guru.xlsx');
    }

    /**
     * Tulis spreadsheet ke file sementara lalu kembalikan sebagai download response.
     */
    private function download(Spreadsheet $spreadsheet, string $filename): BinaryFileResponse
    {
        $writer = new Xlsx($spreadsheet);
        $temp = tempnam(sys_get_temp_dir(), 'guru_').'.xlsx';
        $writer->save($temp);

        return response()->download($temp, $filename)
            ->deleteFileAfterSend(true);
    }
}
