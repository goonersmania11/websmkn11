<?php

namespace Database\Seeders;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\ContentItem;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\Profile;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
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

        // ==========================================
        // PROFILE
        // ==========================================

        Profile::create([
            'nama_sekolah' => 'SMKN 11 Kabupaten Tangerang',
            'logo' => 'logo.png',
            'alamat' => 'Kp. Saradan RT. 03/01, Desa Pangkat, Kec. Jayanti, Kab. Tangerang, Banten 15610',
            'phone' => '0812 9922 0831',
            'email' => 'admin@smkn11kabtang.sch.id',
            'deskripsi' => 'Sekolah kejuruan favorit yang menyiapkan lulusan unggul, berkarakter, dan memiliki kompetensi tinggi sesuai kebutuhan industri masa depan.',
            'sejarah' => 'SMKN 11 Kabupaten Tangerang didirikan pada tahun 2013.',
            'visi' => 'Terselenggaranya layanan prima pendidikan Menengah Kejuruan dalam membentuk kelulusan SMK Negeri 11 Kab. Tangerang yang berakhlaqul karimah, disiplin, mandiri, dan terampil, berjiwa kewirausahaan, siap kerja, memiliki kepribadian bangsa yang mampu mengembangkan keunggulan lokal.',
            'misi' => "Mewujudkan sarana-prasarana belajar sesuai standar Nasional.\nMewujudkan Manajemen berbasis Sekolah dan ICT.\nMewujudkan Pembelajaran yang berstandar Nasional.\nMewujudkan lulusan yang religius.",
            'sambutan_kepala_sekolah' => 'Puji syukur kita panjatkan ke hadirat Allah SWT atas rahmat dan karunia-Nya. SMKN 11 Kabupaten Tangerang berkomitmen penuh untuk menjadi lembaga pendidikan yang inovatif, berdaya saing global, dan berakar pada nilai-nilai luhur bangsa.',
            'foto_kepala_sekolah' => 'kepala-sekolah.jpg',
        ]);

        // ==========================================
        // SITE SETTINGS
        // ==========================================

        $settings = [
            'site_name' => 'SMKN 11 Kabupaten Tangerang',
            'short_name' => 'SMKN 11',
            'tagline' => 'Sekolah kejuruan favorit yang menyiapkan lulusan unggul.',
            'accreditation' => 'B',
            'service_hours' => '08.00 s.d 15.30 WIB',
            'hero_title' => 'SMKN 11 Kabupaten Tangerang',
            'hero_subtitle' => 'Sekolah kejuruan favorit yang menyiapkan lulusan unggul, berkarakter, dan memiliki kompetensi tinggi sesuai kebutuhan industri masa depan.',
            'hero_cta_text' => 'Kontak Kami',
            'home_about_title' => 'Tentang SMKN 11 Kabupaten Tangerang',
            'home_about_body' => 'SMKN 11 Kabupaten Tangerang adalah lembaga pendidikan kejuruan negeri yang berdiri pada tahun 2013 dan berkomitmen mencetak siswa berprestasi, berakhlaqul karimah, dan memiliki kompetensi sesuai kebutuhan industri. Berlokasi di Kecamatan Jayanti, sekolah ini memiliki 6 program keahlian unggulan.',
            'principal_name' => 'Emma Sukmayati',
            'principal_position' => 'Kepala SMKN 11 Kab. Tangerang',
            'principal_welcome_title' => 'Selamat Datang di Portal Resmi SMKN 11 Kabupaten Tangerang',
            'principal_welcome_body' => 'Puji syukur kita panjatkan ke hadirat Allah SWT atas rahmat dan karunia-Nya. Di era digitalisasi dan disrupsi teknologi saat ini, pendidikan vokasi memegang peran krusial dalam mencetak generasi muda yang tidak hanya kompeten, tetapi juga memiliki karakter dan daya adaptasi yang tinggi.',
            'principal_quote' => 'SMK BISA, SMK HEBAT, Vokasi Kuat Menguatkan Indonesia!',
            'footer_description' => 'Sekolah kejuruan favorit yang menyiapkan lulusan unggul, berkarakter, dan memiliki kompetensi tinggi.',
            'spmb_status' => 'dibuka',
            'spmb_title' => 'Seleksi Penerimaan Murid Baru (SPMB) SMKN 11 Kabupaten Tangerang',
            'spmb_description' => 'SPMB adalah sistem penerimaan murid baru untuk jenjang pendidikan menengah kejuruan. SMKN 11 Kabupaten Tangerang mengikuti SPMB Provinsi Banten yang diselenggarakan secara online.',
            'spmb_latest_info' => 'Pendaftaran SPMB Tahun Ajaran 2026/2027 akan dibuka melalui portal resmi SPMB Provinsi Banten.',
            'spmb_portal_url' => 'https://spmb.bantenprov.go.id',
            'spmb_banner_title' => 'SPMB SMKN 11 Kabupaten Tangerang',
            'spmb_banner_description' => 'Portal informasi resmi SPMB. Pendaftaran dilakukan melalui portal SPMB Provinsi Banten.',
            'history_hero_title' => 'Sejarah Sekolah',
            'history_hero_subtitle' => 'Mengenal perjalanan panjang SMKN 11 Kabupaten Tangerang',
            'vision_hero_title' => 'Visi & Misi',
            'vision_hero_subtitle' => 'Arah dan tujuan pendidikan SMKN 11 Kabupaten Tangerang',
            'organization_hero_title' => 'Struktur Organisasi',
            'organization_hero_subtitle' => 'Pimpinan dan tenaga pendidik SMKN 11 Kabupaten Tangerang',
            'programs_hero_title' => 'Program Keahlian',
            'programs_hero_subtitle' => 'Pilih jurusan yang sesuai dengan minat dan bakatmu',
            'facilities_hero_title' => 'Fasilitas',
            'facilities_hero_subtitle' => 'Sarana dan prasarana penunjang pembelajaran',
            'achievements_hero_title' => 'Prestasi',
            'achievements_hero_subtitle' => 'Pencapaian siswa SMKN 11 Kabupaten Tangerang',
            'extracurriculars_hero_title' => 'Ekstrakurikuler',
            'extracurriculars_hero_subtitle' => 'Kegiatan pengembangan bakat dan minat siswa',
            'gallery_hero_title' => 'Galeri',
            'gallery_hero_subtitle' => 'Dokumentasi kegiatan sekolah',
            'news_hero_title' => 'Berita & Informasi',
            'news_hero_subtitle' => 'Update kegiatan dan berita terkini',
            'faq_hero_title' => 'FAQ',
            'faq_hero_subtitle' => 'Pertanyaan yang sering diajukan',
            'contact_hero_title' => 'Kontak',
            'contact_hero_subtitle' => 'Hubungi kami untuk informasi lebih lanjut',
            'spmb_hero_title' => 'SPMB 2026/2027',
            'spmb_hero_subtitle' => 'Informasi penerimaan siswa baru',
        ];

        SiteSetting::setMany($settings);

        // ==========================================
        // JURUSAN
        // ==========================================

        $jurusans = [
            [
                'nama' => 'Teknik Jaringan Komputer dan Telekomunikasi',
                'slug' => 'teknik-jaringan-komputer-dan-telekomunikasi',
                'singkatan' => 'TJKT',
                'deskripsi' => 'Program keahlian TJKT membekali siswa dengan keterampilan dalam perakitan komputer, instalasi jaringan, administrasi server, serta teknologi telekomunikasi.',
                'short_description' => 'Mempelajari perakitan komputer, instalasi jaringan, administrasi server, dan teknologi telekomunikasi.',
                'icon' => 'Monitor',
                'visi' => 'Menjadi pusat keahlian jaringan dan teknologi informasi yang unggul.',
                'misi' => 'Membekali siswa dengan keterampilan jaringan, sistem, dan kerja tim.',
                'competencies' => ['Perakitan dan Perbaikan Komputer', 'Instalasi Jaringan (LAN/WAN)', 'Administrasi Server', 'Keamanan Jaringan', 'Teknologi Telekomunikasi', 'Troubleshooting'],
                'career_prospects' => ['Network Administrator', 'System Administrator', 'Teknisi Jaringan', 'IT Support', 'Wirausaha IT'],
                'facilities' => ['Laboratorium Komputer', 'Peralatan Jaringan', 'Server Khusus', 'Koneksi Fiber Optik'],
                'sort_order' => 1,
            ],
            [
                'nama' => 'Desain Komunikasi Visual',
                'slug' => 'desain-komunikasi-visual',
                'singkatan' => 'DKV',
                'deskripsi' => 'DKV fokus pada pengembangan kreativitas di bidang desain grafis, multimedia, videografi, fotografi, dan animasi.',
                'short_description' => 'Mempelajari desain grafis, multimedia, videografi, fotografi, dan animasi digital.',
                'icon' => 'Palette',
                'visi' => 'Menjadi jurusan unggulan di bidang desain dan multimedia.',
                'misi' => 'Mengembangkan kreativitas siswa di bidang desain digital.',
                'competencies' => ['Desain Grafis', 'Videografi', 'Fotografi Digital', 'Animasi 2D/3D', 'UI/UX Design', 'Produksi Konten Digital'],
                'career_prospects' => ['Desainer Grafis', 'Videografer', 'Fotografer', 'Animator', 'UI/UX Designer'],
                'facilities' => ['Laboratorium Multimedia', 'Kamera DSLR', 'Studio Fotografi', 'Green Screen'],
                'sort_order' => 2,
            ],
            [
                'nama' => 'Teknik Otomotif',
                'slug' => 'teknik-otomotif',
                'singkatan' => 'TO',
                'deskripsi' => 'Teknik Otomotif mendidik siswa untuk memiliki keahlian dalam perawatan dan perbaikan kendaraan.',
                'short_description' => 'Fokus pada perawatan dan perbaikan kendaraan bermotor roda dua dan roda empat.',
                'icon' => 'Car',
                'visi' => 'Menjadi jurusan unggulan di bidang otomotif.',
                'misi' => 'Melatih siswa menjadi mekanik dan teknisi yang terampil.',
                'competencies' => ['Pemeliharaan Mesin', 'Kelistrikan Kendaraan', 'Sistem Sasis', 'Overhaul Mesin', 'Teknologi Injeksi', 'Spooring dan Balancing'],
                'career_prospects' => ['Mekanik Profesional', 'Service Advisor', 'Teknisi Dealer', 'Wirausaha Bengkel'],
                'facilities' => ['Bengkel Standar Industri', 'Engine Stand', 'Car Lift', 'Scanner EFI'],
                'sort_order' => 3,
            ],
            [
                'nama' => 'Teknik Ketenagalistrikan',
                'slug' => 'teknik-ketenagalistrikan',
                'singkatan' => 'TITL',
                'deskripsi' => 'TITL membekali siswa dengan kompetensi di bidang instalasi listrik, sistem tenaga, dan otomasi industri.',
                'short_description' => 'Mempelajari instalasi listrik, sistem tenaga, motor listrik, dan otomasi industri.',
                'icon' => 'Zap',
                'visi' => 'Menjadi jurusan unggulan di bidang kelistrikan.',
                'misi' => 'Melatih siswa menjadi teknisi listrik yang handal.',
                'competencies' => ['Instalasi Listrik', 'Sistem Distribusi Tenaga', 'Motor Listrik', 'PLC', 'Elektronika Daya', 'Panel Listrik'],
                'career_prospects' => ['Teknisi Listrik', 'Instalatir', 'Teknisi Gedung', 'Operator Pembangkit'],
                'facilities' => ['Lab Instalasi Listrik', 'Panel Praktik', 'Trainer PLC'],
                'sort_order' => 4,
            ],
            [
                'nama' => 'Manajemen Perkantoran dan Layanan Bisnis',
                'slug' => 'manajemen-perkantoran-dan-layanan-bisnis',
                'singkatan' => 'MPLB',
                'deskripsi' => 'MPLB membekali siswa dengan kompetensi dalam mengelola administrasi perkantoran dan layanan bisnis.',
                'short_description' => 'Mempelajari administrasi perkantoran, manajemen bisnis, dan layanan profesional.',
                'icon' => 'Calculator',
                'visi' => 'Menjadi jurusan unggulan di bidang administrasi dan bisnis.',
                'misi' => 'Membekali siswa dengan keterampilan perkantoran dan kewirausahaan.',
                'competencies' => ['Administrasi Perkantoran', 'Komunikasi Bisnis', 'Kearsipan Digital', 'Komputer Akuntansi', 'Public Relation', 'Kewirausahaan'],
                'career_prospects' => ['Staf Administrasi', 'Customer Service', 'Admin Keuangan', 'Resepsionis'],
                'facilities' => ['Lab Administrasi', 'Bank Mini', 'Software Perkantoran'],
                'sort_order' => 5,
            ],
            [
                'nama' => 'Busana',
                'slug' => 'busana',
                'singkatan' => 'Busana',
                'deskripsi' => 'Program keahlian Busana membekali siswa dengan keterampilan di bidang desain busana, pembuatan pola, dan menjahit.',
                'short_description' => 'Mempelajari desain busana, pembuatan pola, menjahit, dan produksi fashion.',
                'icon' => 'Scissors',
                'visi' => 'Menjadi jurusan unggulan di bidang fashion dan busana.',
                'misi' => 'Mengembangkan keterampilan desain dan produksi busana.',
                'competencies' => ['Desain Busana', 'Pembuatan Pola', 'Menjahit', 'Teknik Hiasan', 'Manajemen Produksi', 'Kewirausahaan Fashion'],
                'career_prospects' => ['Desainer Busana', 'Penjahit Profesional', 'Pattern Maker', 'Pemilik Butik'],
                'facilities' => ['Ruang Menjahit', 'Mesin Jahit Industri', 'Manekin', 'Lab Desain Busana'],
                'sort_order' => 6,
            ],
        ];

        foreach ($jurusans as $j) {
            Jurusan::create($j);
        }

        // ==========================================
        // GURU
        // ==========================================

        $guruData = [
            ['nama' => 'Emma Sukmayati', 'nip' => '197501012005012001', 'bidang_studi' => 'Kepala Sekolah', 'tempat_lahir' => 'Tangerang', 'tanggal_lahir' => '1975-01-01', 'alamat' => 'Tangerang', 'jabatan' => 'Kepala Sekolah', 'foto' => 'guru1.jpg', 'jenis_kelamin' => 'Perempuan'],
            ['nama' => 'Drs. H. Ahmad Fauzi, M.Pd.', 'nip' => '197201012005012002', 'bidang_studi' => 'Wakil Kepala Sekolah', 'tempat_lahir' => 'Tangerang', 'tanggal_lahir' => '1972-01-01', 'alamat' => 'Tangerang', 'jabatan' => 'Wakil Kepala Sekolah Bidang Kurikulum', 'foto' => 'guru2.jpg', 'jenis_kelamin' => 'Laki-laki'],
            ['nama' => 'Dewi Lestari, S.Pd.', 'nip' => '198501012010012001', 'bidang_studi' => 'Pemrograman Web', 'tempat_lahir' => 'Bandung', 'tanggal_lahir' => '1985-01-01', 'alamat' => 'Tangerang', 'jabatan' => 'Kepala Program Keahlian', 'foto' => 'guru3.jpg', 'jenis_kelamin' => 'Perempuan', 'jurusan_id' => 1],
            ['nama' => 'Agus Pratama, S.T.', 'nip' => '198701012010012002', 'bidang_studi' => 'Jaringan Komputer', 'tempat_lahir' => 'Cimahi', 'tanggal_lahir' => '1987-07-12', 'alamat' => 'Tangerang', 'jabatan' => 'Guru Produktif', 'foto' => 'guru4.jpg', 'jenis_kelamin' => 'Laki-laki', 'jurusan_id' => 1],
            ['nama' => 'Siti Nurhaliza, S.Ds.', 'nip' => '199001012010012003', 'bidang_studi' => 'Desain Grafis', 'tempat_lahir' => 'Bandung', 'tanggal_lahir' => '1990-02-08', 'alamat' => 'Tangerang', 'jabatan' => 'Kepala Program Keahlian', 'foto' => 'guru5.jpg', 'jenis_kelamin' => 'Perempuan', 'jurusan_id' => 2],
            ['nama' => 'Budi Santoso, S.T.', 'nip' => '198801012010012004', 'bidang_studi' => 'Teknik Mesin', 'tempat_lahir' => 'Jakarta', 'tanggal_lahir' => '1988-03-15', 'alamat' => 'Tangerang', 'jabatan' => 'Kepala Program Keahlian', 'foto' => 'guru6.jpg', 'jenis_kelamin' => 'Laki-laki', 'jurusan_id' => 3],
            ['nama' => 'Rina Marlina, S.Pd.', 'nip' => '199101012010012005', 'bidang_studi' => 'Kelistrikan', 'tempat_lahir' => 'Tangerang', 'tanggal_lahir' => '1991-05-20', 'alamat' => 'Tangerang', 'jabatan' => 'Kepala Program Keahlian', 'foto' => 'guru7.jpg', 'jenis_kelamin' => 'Perempuan', 'jurusan_id' => 4],
            ['nama' => 'Hendra Gunawan, S.E.', 'nip' => '198901012010012006', 'bidang_studi' => 'Akuntansi', 'tempat_lahir' => 'Tangerang', 'tanggal_lahir' => '1989-08-10', 'alamat' => 'Tangerang', 'jabatan' => 'Kepala Program Keahlian', 'foto' => 'guru8.jpg', 'jenis_kelamin' => 'Laki-laki', 'jurusan_id' => 5],
            ['nama' => 'Maya Salsabila, S.Sn.', 'nip' => '199201012010012007', 'bidang_studi' => 'Tata Busana', 'tempat_lahir' => 'Tangerang', 'tanggal_lahir' => '1992-11-25', 'alamat' => 'Tangerang', 'jabatan' => 'Kepala Program Keahlian', 'foto' => 'guru9.jpg', 'jenis_kelamin' => 'Perempuan', 'jurusan_id' => 6],
        ];

        foreach ($guruData as $g) {
            Guru::create($g);
        }

        // ==========================================
        // BERITA
        // ==========================================

        $adminId = $admin->id;
        $beritaData = [
            ['user_id' => $adminId, 'judul' => 'Siswa SMKN 11 Raih Medali Ajang Prestasi 2025', 'slug' => Str::slug('Siswa SMKN 11 Raih Medali Ajang Prestasi 2025'), 'isi' => '<p>Febriyani, siswa SMKN 11 Kabupaten Tangerang, berhasil meraih medali perak pada Ajang Prestasi SMK Tingkat Kabupaten Tangerang tahun 2025.</p>', 'gambar' => 'berita1.jpg', 'kategori' => 'Prestasi', 'status' => 'Published', 'tanggal_publish' => now()->subDays(2)],
            ['user_id' => $adminId, 'judul' => 'PPDB Tahun Ajaran 2026/2027 Segera Dibuka', 'slug' => Str::slug('PPDB Tahun Ajaran 2026/2027 Segera Dibuka'), 'isi' => '<p>Penerimaan Peserta Didik Baru SMKN 11 Kabupaten Tangerang tahun ajaran 2026/2027 akan segera dibuka secara online melalui portal resmi PPDB Provinsi Banten.</p>', 'gambar' => 'berita2.jpg', 'kategori' => 'Informasi', 'status' => 'Published', 'tanggal_publish' => now()->subDays(5)],
            ['user_id' => $adminId, 'judul' => 'Kunjungan Industri Jurusan Teknik Otomotif', 'slug' => Str::slug('Kunjungan Industri Jurusan Teknik Otomotif'), 'isi' => '<p>Siswa kelas XI Teknik Otomotif mengikuti kegiatan Kunjungan Industri ke pabrik perakitan mobil ternama di Cikarang.</p>', 'gambar' => 'berita3.jpg', 'kategori' => 'Kegiatan', 'status' => 'Published', 'tanggal_publish' => now()->subDays(10)],
        ];

        foreach ($beritaData as $b) {
            Berita::create($b);
        }

        // ==========================================
        // PRESTASI
        // ==========================================

        $prestasiData = [
            ['nama_prestasi' => 'Medali Perak Ajang Prestasi SMK', 'tingkat' => 'Kabupaten', 'kategori' => 'Akademik', 'tahun' => '2025', 'event' => 'Ajang Prestasi SMK Kabupaten Tangerang', 'rank' => 'Medali Perak', 'penerima' => 'Febriyani', 'deskripsi' => 'Siswa meraih medali perak.', 'gambar' => 'prestasi1.jpg'],
            ['nama_prestasi' => 'Medali Perak LKS', 'tingkat' => 'Kabupaten', 'kategori' => 'Akademik', 'tahun' => '2024', 'event' => 'Lomba Kompetensi Siswa Kabupaten', 'rank' => 'Juara 2', 'penerima' => 'Melati Febriyani', 'deskripsi' => 'Siswa meraih juara 2.', 'gambar' => 'prestasi2.jpg'],
        ];

        foreach ($prestasiData as $p) {
            Prestasi::create($p);
        }

        // ==========================================
        // PENGUMUMAN
        // ==========================================

        $pengumumanData = [
            ['judul' => 'Pendaftaran PKL Gelombang 1', 'isi' => 'Pendaftaran PKL gelombang 1 dibuka mulai tanggal 1 Agustus 2026.', 'tanggal' => '2026-08-01', 'status' => 'Aktif'],
            ['judul' => 'Libur Hari Kemerdekaan', 'isi' => 'Sekolah libur pada tanggal 17 Agustus 2026.', 'tanggal' => '2026-08-17', 'status' => 'Aktif'],
        ];

        foreach ($pengumumanData as $p) {
            Pengumuman::create($p);
        }

        // ==========================================
        // AGENDA
        // ==========================================

        $agendaData = [
            ['judul' => 'Rapat Koordinasi Guru', 'deskripsi' => 'Rapat koordinasi persiapan semester baru.', 'tanggal' => '2026-08-05', 'waktu' => '09:00:00', 'lokasi' => 'Aula SMKN 11', 'gambar' => 'agenda1.jpg'],
            ['judul' => 'Lomba Keterampilan Siswa', 'deskripsi' => 'Acara lomba keterampilan tingkat sekolah.', 'tanggal' => '2026-08-20', 'waktu' => '13:00:00', 'lokasi' => 'Lapangan SMKN 11', 'gambar' => 'agenda2.jpg'],
        ];

        foreach ($agendaData as $a) {
            Agenda::create($a);
        }

        // ==========================================
        // CONTENT ITEMS - SEJARAH
        // ==========================================

        $milestones = [
            ['year' => '2013', 'title' => 'Pendirian SMKN 11 Kabupaten Tangerang', 'body' => 'Berdasarkan SK Operasional No. 420/Kep.678-Huk/2013 pada tanggal 5 Oktober 2013, SMKN 11 Kabupaten Tangerang resmi didirikan.'],
            ['year' => '2014', 'title' => 'Tahun Ajaran Perdana', 'body' => 'Tahun ajaran pertama dimulai dengan membuka beberapa program keahlian.'],
            ['year' => '2015', 'title' => 'Pengembangan Program Keahlian', 'body' => 'Melakukan pengembangan dan penambahan program keahlian untuk menjawab kebutuhan industri.'],
            ['year' => '2016', 'title' => 'Peningkatan Kualitas Pembelajaran', 'body' => 'Mengembangkan model pembelajaran berbasis ICT.'],
            ['year' => '2017', 'title' => 'Penambahan Sarana dan Prasarana', 'body' => 'Melakukan pembangunan dan renovasi sarana prasarana sekolah.'],
            ['year' => '2018', 'title' => 'Akreditasi B', 'body' => 'Meraih akreditasi B berdasarkan SK No. 039/BAN-SM-Prov/SK/2018.'],
            ['year' => '2019', 'title' => 'Kegiatan Keagamaan dan Sosial', 'body' => 'Menyelenggarakan peringatan Maulid Nabi Muhammad SAW.'],
            ['year' => '2020', 'title' => 'Adaptasi Pembelajaran Daring', 'body' => 'Menerapkan sistem pembelajaran daring selama masa pandemi.'],
            ['year' => '2022', 'title' => 'Pembaruan Kurikulum', 'body' => 'Melakukan transisi menuju Kurikulum Merdeka.'],
            ['year' => '2024', 'title' => 'Inovasi dan Prestasi', 'body' => 'Terus berinovasi dan meraih berbagai prestasi di ajang LKS.'],
        ];

        foreach ($milestones as $i => $m) {
            ContentItem::create([
                'type' => 'history',
                'title' => $m['title'],
                'body' => $m['body'],
                'extra_1' => $m['year'],
                'sort_order' => $i,
            ]);
        }

        // ==========================================
        // CONTENT ITEMS - NILAI INTI
        // ==========================================

        $values = [
            ['title' => 'Integritas', 'body' => 'Menjunjung tinggi kejujuran, tanggung jawab, dan akhlakul karimah.', 'icon' => 'ti ti-shield-check'],
            ['title' => 'Inovasi', 'body' => 'Terus berkreasi dan beradaptasi dengan perkembangan teknologi.', 'icon' => 'ti ti-bulb'],
            ['title' => 'Kolaborasi', 'body' => 'Membangun kemitraan dengan dunia usaha, industri, dan masyarakat.', 'icon' => 'ti ti-users'],
            ['title' => 'Keunggulan', 'body' => 'Berorientasi pada mutu dan kualitas layanan pendidikan yang unggul.', 'icon' => 'ti ti-award'],
        ];

        foreach ($values as $i => $v) {
            ContentItem::create(['type' => 'core_value', 'title' => $v['title'], 'body' => $v['body'], 'icon' => $v['icon'], 'sort_order' => $i]);
        }

        // ==========================================
        // CONTENT ITEMS - STATISTIK
        // ==========================================

        $stats = [
            ['title' => 'Siswa Aktif', 'extra_1' => '1.124+', 'icon' => 'ti ti-users'],
            ['title' => 'Tenaga Pengajar', 'extra_1' => '51+', 'icon' => 'ti ti-school'],
            ['title' => 'Program Keahlian', 'extra_1' => '6', 'icon' => 'ti ti-book'],
            ['title' => 'Rombel', 'extra_1' => '33', 'icon' => 'ti ti-trophy'],
        ];

        foreach ($stats as $i => $s) {
            ContentItem::create(['type' => 'statistic', 'title' => $s['title'], 'extra_1' => $s['extra_1'], 'icon' => $s['icon'], 'sort_order' => $i]);
        }

        // ==========================================
        // CONTENT ITEMS - FASILITAS
        // ==========================================

        $facilities = [
            ['title' => 'Laboratorium Komputer', 'body' => '4 ruang laboratorium dengan PC spesifikasi tinggi dan koneksi internet fiber optik.', 'category' => 'Akademik'],
            ['title' => 'Bengkel Otomotif', 'body' => 'Bengkel luas standar industri dengan peralatan servis lengkap.', 'category' => 'Akademik'],
            ['title' => 'Perpustakaan Digital', 'body' => 'Ruang baca nyaman dengan akses e-book dan jurnal online.', 'category' => 'Akademik'],
            ['title' => 'Lapangan Olahraga Utama', 'body' => 'Lapangan serbaguna untuk futsal, basket, voli, dan upacara.', 'category' => 'Fasilitas Umum'],
            ['title' => 'Masjid Ulil Albab', 'body' => 'Masjid sekolah untuk ibadah dan kegiatan keagamaan.', 'category' => 'Keagamaan'],
            ['title' => 'Aula Serbaguna', 'body' => 'Gedung aula berkapasitas 500 orang.', 'category' => 'Fasilitas Umum'],
            ['title' => 'Laboratorium Akuntansi (Bank Mini)', 'body' => 'Ruang praktik jurusan MPLB dengan desain pelayanan teller bank.', 'category' => 'Akademik'],
            ['title' => 'Ruang Multimedia & Podcast', 'body' => 'Ruangan kedap suara dengan perangkat rekaman audio visual.', 'category' => 'Pendukung'],
        ];

        foreach ($facilities as $i => $f) {
            ContentItem::create(['type' => 'facility', 'title' => $f['title'], 'body' => $f['body'], 'category' => $f['category'], 'sort_order' => $i]);
        }

        // ==========================================
        // CONTENT ITEMS - EKSTRAKURIKULER
        // ==========================================

        $eksul = [
            ['title' => 'Paskibra Satria 11', 'body' => 'Pasukan Pengibar Bendera yang melatih kedisiplinan dan nasionalisme.', 'category' => 'Kedisiplinan', 'extra_1' => 'Aiptu Hendra Gunawan', 'extra_2' => 'Jumat & Sabtu'],
            ['title' => 'Futsal', 'body' => 'Wadah pengembangan bakat olahraga futsal.', 'category' => 'Olahraga', 'extra_1' => 'Pak Rahmat Hidayat', 'extra_2' => 'Selasa & Kamis'],
            ['title' => 'Basket', 'body' => 'Ekstrakurikuler bola basket.', 'category' => 'Olahraga', 'extra_1' => 'Pak Dede Supriyadi', 'extra_2' => 'Senin & Rabu'],
            ['title' => 'Rohis', 'body' => 'Kegiatan kerohanian Islam.', 'category' => 'Keagamaan', 'extra_1' => 'Bu Aisyah S.Pd.I', 'extra_2' => 'Jumat'],
            ['title' => 'PMR', 'body' => 'Organisasi kepalangmerahan.', 'category' => 'Sosial', 'extra_1' => 'Bu Dewi Sartika', 'extra_2' => 'Sabtu'],
            ['title' => 'Pramuka', 'body' => 'Kegiatan kepanduan.', 'category' => 'Kedisiplinan', 'extra_1' => 'Pak Sutrisno', 'extra_2' => 'Jumat'],
            ['title' => 'Jurnalistik & Multimedia', 'body' => 'Wadah pengembangan minat penulisan dan produksi konten digital.', 'category' => 'Seni & Kreatif', 'extra_1' => 'Pak Wahyu Nugroho', 'extra_2' => 'Rabu'],
            ['title' => 'Seni Tari & Musik', 'body' => 'Eksplorasi bakat seni tari dan musik.', 'category' => 'Seni & Kreatif', 'extra_1' => 'Bu Rina Marlina', 'extra_2' => 'Kamis'],
            ['title' => 'English Club', 'body' => 'Klub percakapan bahasa Inggris.', 'category' => 'Akademik', 'extra_1' => 'Bu Nani Kusmawati', 'extra_2' => 'Selasa'],
            ['title' => 'Taekwondo', 'body' => 'Latihan bela diri taekwondo.', 'category' => 'Olahraga', 'extra_1' => 'Pak Agus Salim', 'extra_2' => 'Kamis & Sabtu'],
        ];

        foreach ($eksul as $i => $e) {
            ContentItem::create(['type' => 'extracurricular', 'title' => $e['title'], 'body' => $e['body'], 'category' => $e['category'], 'extra_1' => $e['extra_1'], 'extra_2' => $e['extra_2'], 'sort_order' => $i]);
        }

        // ==========================================
        // CONTENT ITEMS - FAQ
        // ==========================================

        $faqs = [
            ['title' => 'Apa saja program keahlian yang tersedia?', 'body' => 'SMKN 11 memiliki 6 program keahlian: TJKT, DKV, Teknik Otomotif, TITL, MPLB, dan Busana.', 'category' => 'Umum'],
            ['title' => 'Bagaimana cara mendaftar PPDB?', 'body' => 'Pendaftaran dilakukan secara online melalui portal resmi PPDB Provinsi Banten.', 'category' => 'PPDB'],
            ['title' => 'Apa saja jalur pendaftaran?', 'body' => 'Terdapat jalur zonasi, prestasi, afirmasi, dan perpindahan tugas orang tua.', 'category' => 'PPDB'],
            ['title' => 'Berapa biaya sekolah?', 'body' => 'SMKN 11 adalah sekolah negeri gratis yang tidak memungut biaya SPP.', 'category' => 'Umum'],
            ['title' => 'Apakah ada beasiswa?', 'body' => 'Ya, tersedia program beasiswa melalui PIP, Kartu Tangerang Pintar, dan mitra DU/DI.', 'category' => 'Umum'],
            ['title' => 'Bagaimana peluang kerja lulusan?', 'body' => 'Lulusan memiliki peluang kerja yang sangat baik karena kurikulum selaras dengan kebutuhan industri.', 'category' => 'Karir'],
            ['title' => 'Apakah ada kegiatan ekstrakurikuler?', 'body' => 'Ya, tersedia Paskibra, Futsal, Basket, Rohis, PMR, Pramuka, dan lainnya.', 'category' => 'Kesiswaan'],
            ['title' => 'Bagaimana jam belajar?', 'body' => 'Senin-Kamis 07.00-15.30, Jumat 07.00-11.30.', 'category' => 'Umum'],
        ];

        foreach ($faqs as $i => $f) {
            ContentItem::create(['type' => 'faq', 'title' => $f['title'], 'body' => $f['body'], 'category' => $f['category'], 'sort_order' => $i]);
        }

        // ==========================================
        // CONTENT ITEMS - SPMB
        // ==========================================

        $spmbReqs = [
            'Ijazah SMP / Surat Keterangan Lulus (SKL)',
            'Kartu Keluarga (KK)',
            'Akta Kelahiran',
            'Pas Foto Berwarna (3x4)',
            'SKHUN / Surat Keterangan Hasil Ujian Nasional',
            'Rapor SMP Semester 1 - 5',
            'Kartu NISN (jika ada)',
            'Sertifikat prestasi (jika mendaftar jalur prestasi)',
        ];

        foreach ($spmbReqs as $i => $r) {
            ContentItem::create(['type' => 'spmb_requirement', 'title' => $r, 'sort_order' => $i]);
        }

        $spmbSchedule = [
            ['title' => 'Pendaftaran Online', 'extra_1' => 'pendaftaran', 'extra_2' => '20-25 Juni 2026'],
            ['title' => 'Seleksi Administrasi & Akademik', 'extra_1' => 'seleksi', 'extra_2' => '1-5 Juli 2026'],
            ['title' => 'Pengumuman Hasil Seleksi', 'extra_1' => 'pengumuman', 'extra_2' => '10 Juli 2026'],
            ['title' => 'Daftar Ulang', 'extra_1' => 'daftar_ulang', 'extra_2' => '11-15 Juli 2026'],
        ];

        foreach ($spmbSchedule as $i => $s) {
            ContentItem::create(['type' => 'spmb_schedule', 'title' => $s['title'], 'extra_1' => $s['extra_1'], 'extra_2' => $s['extra_2'], 'sort_order' => $i]);
        }

        $spmbFlow = [
            ['title' => 'Informasi', 'body' => 'Pelajari informasi SPMB, jadwal, dan persyaratan di halaman ini.'],
            ['title' => 'Persiapan Persyaratan', 'body' => 'Siapkan dokumen administrasi yang diperlukan.'],
            ['title' => 'Daftar di Portal Resmi', 'body' => 'Lakukan pendaftaran melalui portal SPMB Provinsi Banten.'],
            ['title' => 'Seleksi', 'body' => 'Ikuti tahap seleksi sesuai jadwal yang ditetapkan.'],
            ['title' => 'Pengumuman', 'body' => 'Cek hasil seleksi di portal resmi SPMB.'],
            ['title' => 'Daftar Ulang', 'body' => 'Lakukan daftar ulang jika dinyatakan diterima.'],
        ];

        foreach ($spmbFlow as $i => $f) {
            ContentItem::create(['type' => 'spmb_flow', 'title' => $f['title'], 'body' => $f['body'], 'sort_order' => $i]);
        }

        $spmbFaqs = [
            ['title' => 'Apa itu SPMB?', 'body' => 'SPMB adalah sistem penerimaan siswa baru yang diselenggarakan oleh Dinas Pendidikan Provinsi Banten secara online.'],
            ['title' => 'Di mana saya mendaftar?', 'body' => 'Pendaftaran dilakukan melalui portal resmi SPMB Provinsi Banten.'],
            ['title' => 'Kapan pendaftaran dibuka?', 'body' => 'Jadwal pendaftaran mengikuti ketentuan SPMB Provinsi Banten.'],
            ['title' => 'Apakah ada biaya pendaftaran?', 'body' => 'Pendaftaran SPMB tidak dipungut biaya (gratis).'],
            ['title' => 'Apakah menerima siswa dari luar daerah?', 'body' => 'Ya, sesuai kuota jalur zonasi, prestasi, afirmasi, dan perpindahan tugas orang tua.'],
        ];

        foreach ($spmbFaqs as $i => $f) {
            ContentItem::create(['type' => 'spmb_faq', 'title' => $f['title'], 'body' => $f['body'], 'sort_order' => $i]);
        }
    }
}
