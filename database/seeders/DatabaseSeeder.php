<?php

namespace Database\Seeders;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin SMKN 11',
            'email' => 'admin@smkn11.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@smkn11.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        Profile::create([
            'nama_sekolah' => 'SMKN 11 Bandung',
            'logo' => 'logo.png',
            'alamat' => 'Jl. Cikutra No. 11, Bandung',
            'deskripsi' => 'Sekolah menengah kejuruan yang unggul dalam teknologi dan industri.',
            'sejarah' => 'SMKN 11 Bandung berdiri sejak tahun 2001 dan terus berkembang menjadi sekolah favorit.',
            'visi' => 'Menjadi sekolah kejuruan unggul, berkarakter, dan siap bersaing di dunia industri.',
            'misi' => 'Menyelenggarakan pendidikan vokasi berkualitas, mengembangkan karakter, dan membentuk lulusan yang kompetitif.',
            'sambutan_kepala_sekolah' => 'Selamat datang di SMKN 11 Bandung, semoga kita bisa bersama-sama membangun generasi masa depan.',
            'foto_kepala_sekolah' => 'kepala-sekolah.jpg',
        ]);

        $jurusans = [
            [
                'nama' => 'Teknik Komputer dan Jaringan',
                'slug' => 'teknik-komputer-dan-jaringan',
                'singkatan' => 'TKJ',
                'deskripsi' => 'Jurusan yang fokus pada jaringan komputer, sistem, dan administrasi server.',
                'gambar' => 'tkj.jpg',
                'visi' => 'Menjadi pusat keahlian jaringan dan teknologi informasi yang unggul.',
                'misi' => 'Membekali siswa dengan keterampilan jaringan, sistem, dan kerja tim.',
            ],
            [
                'nama' => 'Rekayasa Perangkat Lunak',
                'slug' => 'rekayasa-perangkat-lunak',
                'singkatan' => 'RPL',
                'deskripsi' => 'Jurusan yang mempelajari pengembangan aplikasi, web, dan software.',
                'gambar' => 'rpl.jpg',
                'visi' => 'Menghasilkan programmer handal yang siap kerja dan berwirausaha.',
                'misi' => 'Mengembangkan kemampuan coding, desain, dan pemecahan masalah.',
            ],
            [
                'nama' => 'Teknik Elektronika Industri',
                'slug' => 'teknik-elektronika-industri',
                'singkatan' => 'TEI',
                'deskripsi' => 'Jurusan yang mempelajari sistem elektronika, kontrol, dan otomasi industri.',
                'gambar' => 'tei.jpg',
                'visi' => 'Menjadi jurusan unggulan di bidang elektronika industri.',
                'misi' => 'Melatih siswa menjadi teknisi dan engineer yang terampil.',
            ],
        ];

        foreach ($jurusans as $jurusan) {
            Jurusan::create($jurusan);
        }

        $guruData = [
            [
                'nama' => 'Dewi Lestari',
                'nip' => '198501012010012001',
                'bidang_studi' => 'Pemrograman Web',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1985-01-01',
                'alamat' => 'Bandung',
                'social_media' => '@dewi',
                'jabatan' => 'Kepala Program Keahlian',
                'foto' => 'guru1.jpg',
                'jenis_kelamin' => 'Perempuan',
            ],
            [
                'nama' => 'Agus Pratama',
                'nip' => '198701012010012002',
                'bidang_studi' => 'Jaringan Komputer',
                'tempat_lahir' => 'Cimahi',
                'tanggal_lahir' => '1987-07-12',
                'alamat' => 'Cimahi',
                'social_media' => '@agus',
                'jabatan' => 'Guru Produktif',
                'foto' => 'guru2.jpg',
                'jenis_kelamin' => 'Laki-laki',
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'nip' => '199001012010012003',
                'bidang_studi' => 'Elektronika',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1990-02-08',
                'alamat' => 'Bandung',
                'social_media' => '@siti',
                'jabatan' => 'Guru Produktif',
                'foto' => 'guru3.jpg',
                'jenis_kelamin' => 'Perempuan',
            ],
        ];

        foreach ($guruData as $guru) {
            Guru::create($guru);
        }

        $beritaData = [
            [
                'user_id' => $admin->id,
                'judul' => 'Pelatihan Coding untuk Siswa SMKN 11',
                'slug' => Str::slug('Pelatihan Coding untuk Siswa SMKN 11'),
                'isi' => 'Siswa SMKN 11 mengikuti pelatihan coding intensif selama dua minggu.',
                'gambar' => 'berita1.jpg',
                'kategori' => 'Teknologi',
                'status' => 'Published',
                'tanggal_publish' => now()->subDays(2)->toDateString(),
            ],
            [
                'user_id' => $admin->id,
                'judul' => 'Lomba Robotik Tingkat Kabupaten',
                'slug' => Str::slug('Lomba Robotik Tingkat Kabupaten'),
                'isi' => 'Tim robotik SMKN 11 berhasil meraih juara 2 di ajang lomba tingkat kabupaten.',
                'gambar' => 'berita2.jpg',
                'kategori' => 'Prestasi',
                'status' => 'Published',
                'tanggal_publish' => now()->subDays(5)->toDateString(),
            ],
            [
                'user_id' => $admin->id,
                'judul' => 'Workshop Desain UI/UX',
                'slug' => Str::slug('Workshop Desain UI/UX'),
                'isi' => 'Workshop desain UI/UX diadakan untuk siswa jurusan RPL dan TKJ.',
                'gambar' => 'berita3.jpg',
                'kategori' => 'Kegiatan',
                'status' => 'Draft',
                'tanggal_publish' => now()->addDays(3)->toDateString(),
            ],
        ];

        foreach ($beritaData as $berita) {
            Berita::create($berita);
        }

        $prestasiData = [
            [
                'nama_prestasi' => 'Juara 1 Lomba Web Design',
                'tingkat' => 'Kabupaten',
                'kategori' => 'Seni',
                'tahun' => '2024',
                'penerima' => 'Rizki Pratama',
                'deskripsi' => 'Prestasi ini diraih oleh siswa SMKN 11 di bidang desain web.',
                'gambar' => 'prestasi1.jpg',
            ],
            [
                'nama_prestasi' => 'Juara 2 Olimpiade Informatika',
                'tingkat' => 'Provinsi',
                'kategori' => 'Akademik',
                'tahun' => '2023',
                'penerima' => 'Maya Salsabila',
                'deskripsi' => 'Siswa berhasil meraih posisi kedua dalam olimpiade informatika provinsi.',
                'gambar' => 'prestasi2.jpg',
            ],
        ];

        foreach ($prestasiData as $prestasi) {
            Prestasi::create($prestasi);
        }

        $pengumumanData = [
            [
                'judul' => 'Pendaftaran PKL Gelombang 1',
                'isi' => 'Pendaftaran PKL gelombang 1 dibuka mulai tanggal 1 Agustus 2026.',
                'tanggal' => '2026-08-01',
                'status' => 'Aktif',
            ],
            [
                'judul' => 'Libur Hari Kemerdekaan',
                'isi' => 'Sekolah libur pada tanggal 17 Agustus 2026.',
                'tanggal' => '2026-08-17',
                'status' => 'Aktif',
            ],
        ];

        foreach ($pengumumanData as $pengumuman) {
            Pengumuman::create($pengumuman);
        }

        $agendaData = [
            [
                'judul' => 'Rapat Koordinasi Guru',
                'deskripsi' => 'Rapat koordinasi persiapan semester baru.',
                'tanggal' => '2026-08-05',
                'waktu' => '09:00:00',
                'lokasi' => 'Aula SMKN 11',
                'gambar' => 'agenda1.jpg',
            ],
            [
                'judul' => 'Lomba Keterampilan Siswa',
                'deskripsi' => 'Acara lomba keterampilan tingkat sekolah.',
                'tanggal' => '2026-08-20',
                'waktu' => '13:00:00',
                'lokasi' => 'Lapangan SMKN 11',
                'gambar' => 'agenda2.jpg',
            ],
        ];

        foreach ($agendaData as $agenda) {
            Agenda::create($agenda);
        }
    }
}