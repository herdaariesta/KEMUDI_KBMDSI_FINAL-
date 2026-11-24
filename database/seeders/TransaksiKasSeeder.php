<?php

namespace Database\Seeders;

use App\Models\ProgramKerja;
use App\Models\TransaksiKas;
use Illuminate\Database\Seeder;

class TransaksiKasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransaksiKas::truncate();

        $expo = ProgramKerja::where('kode', 'KL-01')->first();
        $lkmm = ProgramKerja::where('kode', 'PS-02')->first();
        $bindes = ProgramKerja::where('kode', 'PM-01')->first();
        $stuband = ProgramKerja::where('kode', 'HM-02')->first();

        $transaksi = [
            [
                'program_kerja_id' => $expo?->id,
                'tanggal' => '2026-05-24',
                'deskripsi' => 'Dana Sponsorship Bank Mandiri',
                'pihak_terkait' => 'Termin 1 Tech Expo KBMDSI',
                'jenis' => 'masuk',
                'kategori' => 'Sponsorship & Danus',
                'nominal' => 2500000,
                'minggu_ke' => 4,
                'bukti_transaksi' => 'bukti_mandiri_sponsor.pdf',
            ],
            [
                'program_kerja_id' => null,
                'tanggal' => '2026-05-21',
                'deskripsi' => 'Konsumsi Rapat Pleno 2',
                'pihak_terkait' => '32 Nasi Box Dapur Kirana x BPH',
                'jenis' => 'keluar',
                'kategori' => 'Konsumsi Rapat Pleno',
                'nominal' => 525000,
                'minggu_ke' => 3,
                'bukti_transaksi' => 'nota_dapur_kirana.pdf',
            ],
            [
                'program_kerja_id' => null,
                'tanggal' => '2026-05-18',
                'deskripsi' => 'Penyetoran Kas Pengurus Tahap 2',
                'pihak_terkait' => '14 Anggota PSDM & Humas',
                'jenis' => 'masuk',
                'kategori' => 'Iuran Kas Pengurus',
                'nominal' => 840000,
                'minggu_ke' => 3,
                'bukti_transaksi' => 'rekap_kas_tahap2.pdf',
            ],
            [
                'program_kerja_id' => null,
                'tanggal' => '2026-05-12',
                'deskripsi' => 'Kertas HVS & Tinta Stempel',
                'pihak_terkait' => 'Gramedia Mall Olympic Garden',
                'jenis' => 'keluar',
                'kategori' => 'Operasional & ATK',
                'nominal' => 295000,
                'minggu_ke' => 2,
                'bukti_transaksi' => 'struk_gramedia.pdf',
            ],
            [
                'program_kerja_id' => $expo?->id,
                'tanggal' => '2026-05-10',
                'deskripsi' => 'Penjualan Merchandise KBMDSI',
                'pihak_terkait' => 'Divisi Danus Batch 1 Expo',
                'jenis' => 'masuk',
                'kategori' => 'Sponsorship & Danus',
                'nominal' => 1040000,
                'minggu_ke' => 2,
                'bukti_transaksi' => 'rekap_penjualan_merch.pdf',
            ],
            [
                'program_kerja_id' => null,
                'tanggal' => '2026-05-05',
                'deskripsi' => 'Penyetoran Kas Pengurus Tahap 1',
                'pihak_terkait' => '27 Anggota BPH, PIT & Litbang',
                'jenis' => 'masuk',
                'kategori' => 'Iuran Kas Pengurus',
                'nominal' => 1620000,
                'minggu_ke' => 1,
                'bukti_transaksi' => 'rekap_kas_tahap1.pdf',
            ],
            [
                'program_kerja_id' => null,
                'tanggal' => '2026-05-04',
                'deskripsi' => 'Konsumsi Rapat Pleno 1',
                'pihak_terkait' => 'Snack Box Amanda Brownies BPH',
                'jenis' => 'keluar',
                'kategori' => 'Konsumsi Rapat Pleno',
                'nominal' => 295000,
                'minggu_ke' => 1,
                'bukti_transaksi' => 'nota_amanda.pdf',
            ],
            [
                'program_kerja_id' => null,
                'tanggal' => '2026-05-02',
                'deskripsi' => 'Penggandaan Berkas & Map LPJ',
                'pihak_terkait' => 'Percetakan Surya FILKOM UB',
                'jenis' => 'keluar',
                'kategori' => 'Operasional & ATK',
                'nominal' => 125000,
                'minggu_ke' => 1,
                'bukti_transaksi' => 'nota_percetakan.pdf',
            ],
            [
                'program_kerja_id' => $lkmm?->id,
                'tanggal' => '2026-05-27',
                'deskripsi' => 'Sewa Sound & Proyektor Sosialisasi',
                'pihak_terkait' => 'Multimedia Rental Malang',
                'jenis' => 'keluar',
                'kategori' => 'Operasional Kegiatan',
                'nominal' => 510000,
                'minggu_ke' => 4,
                'bukti_transaksi' => 'kuitansi_sound.pdf',
            ],
        ];

        foreach ($transaksi as $data) {
            TransaksiKas::create($data);
        }
    }
}
