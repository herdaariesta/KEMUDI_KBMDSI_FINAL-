<?php

namespace Database\Seeders;

use App\Models\ProgramKerja;
use Illuminate\Database\Seeder;

class ProgramKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prokers = [
            [
                'kode' => 'KL-01',
                'nama' => 'DSI Informatics Expo 2026',
                'divisi' => 'PIT',
                'pic' => 'Fahri Dewantoro',
                'pagu_anggaran' => 18500000,
                'jadwal' => '18 - 20 Mei 2026',
                'tempat' => 'Gedung G FILKOM UB',
                'progres_persen' => 95,
                'progres_deskripsi' => 'Finalisasi Booth',
                'status_lpj' => 'Draft H-2 Acara',
                'deskripsi' => 'Pameran teknologi informatika tahunan KBMDSI dengan peserta mahasiswa dan industri.',
            ],
            [
                'kode' => 'PS-02',
                'nama' => 'LKMM-TD DSI 2026',
                'divisi' => 'PSDM',
                'pic' => 'Nadya Maharani',
                'pagu_anggaran' => 12000000,
                'jadwal' => '06 - 07 Juni 2026',
                'tempat' => 'Kusuma Agrowisata',
                'progres_persen' => 40,
                'progres_deskripsi' => 'Open Recruitment',
                'status_lpj' => 'Belum Terbit',
                'deskripsi' => 'Latihan Keterampilan Manajemen Mahasiswa Tingkat Dasar untuk kaderisasi anggota.',
            ],
            [
                'kode' => 'PM-01',
                'nama' => 'Bina Desa Digital: SIM BumDes',
                'divisi' => 'MEDKOMINFO',
                'pic' => 'Sthefany SheanMoulia',
                'pagu_anggaran' => 14200000,
                'jadwal' => '15 - 28 Juli 2026',
                'tempat' => 'Ds. Poncokusumo Malang',
                'progres_persen' => 60,
                'progres_deskripsi' => 'Survei Lapangan',
                'status_lpj' => 'Tahap Proposal',
                'deskripsi' => 'Pengabdian masyarakat implementasi sistem informasi manajemen BumDes di desa binaan.',
            ],
            [
                'kode' => 'HM-02',
                'nama' => 'Studi Banding Eksternal 2026',
                'divisi' => 'MEDKOMINFO',
                'pic' => 'Herda Ariesta',
                'pagu_anggaran' => 8900000,
                'jadwal' => '12 - 14 Maret 2026',
                'tempat' => 'Surabaya & Depok',
                'progres_persen' => 100,
                'progres_deskripsi' => 'Selesai Total',
                'status_lpj' => '✓ Disahkan DPA (Paripurna)',
                'deskripsi' => 'Kunjungan studi banding organisasi kemahasiswaan ke universitas mitra.',
            ],
            [
                'kode' => 'LB-01',
                'nama' => 'Survey Evaluasi Tengah Semester',
                'divisi' => 'ADVOKESMA',
                'pic' => 'Raka Gandesta',
                'pagu_anggaran' => 2450000,
                'jadwal' => '01 - 15 Mei 2026',
                'tempat' => 'Portal DSI Online',
                'progres_persen' => 90,
                'progres_deskripsi' => 'Analisis Data',
                'status_lpj' => 'Review DPA',
                'deskripsi' => 'Penjaringan aspirasi dan evaluasi akademik perkuliahan tengah semester mahasiswa DSI.',
            ],
            [
                'kode' => 'PS-01',
                'nama' => 'Inaugurasi & Welcoming Party 2026',
                'divisi' => 'PSDM',
                'pic' => 'Baskara Arya',
                'pagu_anggaran' => 11700000,
                'jadwal' => '22 Agustus 2026',
                'tempat' => 'Samantha Krida UB',
                'progres_persen' => 25,
                'progres_deskripsi' => 'Persetujuan Dekan',
                'status_lpj' => 'Review Proposal',
                'deskripsi' => 'Penyambutan mahasiswa baru Departemen Sistem Informasi angkatan 2026.',
            ],
        ];

        foreach ($prokers as $proker) {
            ProgramKerja::updateOrCreate(['kode' => $proker['kode']], $proker);
        }
    }
}
