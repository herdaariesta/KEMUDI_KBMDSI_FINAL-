<?php

namespace Database\Seeders;

use App\Models\IuranPengurus;
use Illuminate\Database\Seeder;

class IuranPengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IuranPengurus::truncate();

        // 3 Key members from design
        $keyMembers = [
            [
                'nama_anggota' => 'Rani Pratama',
                'divisi' => 'BPH (Sekretaris 1)',
                'periode' => 'Mei 2026',
                'nominal' => 60000,
                'status' => 'lunas',
                'tanggal_bayar' => '2026-05-03',
            ],
            [
                'nama_anggota' => 'Fakhri Al-Ghafiqi',
                'divisi' => 'PIT (Ketua Divisi)',
                'periode' => 'Mei 2026',
                'nominal' => 60000,
                'status' => 'lunas',
                'tanggal_bayar' => '2026-05-04',
            ],
            [
                'nama_anggota' => 'Bagas Raditya',
                'divisi' => 'PSDM (Staff)',
                'periode' => 'Mei 2026',
                'nominal' => 60000,
                'status' => 'belum',
                'tanggal_bayar' => null,
            ],
        ];

        foreach ($keyMembers as $m) {
            IuranPengurus::create($m);
        }

        // 39 additional Lunas (total 41 lunas)
        $namaLunas = [
            ['Nadya Maharani', 'PSDM'],
            ['Sthefany SheanMoulia', 'MEDKOMINFO'],
            ['Herda Ariesta', 'MEDKOMINFO'],
            ['Raka Gandesta', 'ADVOKESMA'],
            ['Baskara Arya', 'PSDM'],
            ['Jason Pratama', 'BPH'],
            ['Fahri Dewantoro', 'PIT'],
            ['Luna Arabela', 'MEDKOMINFO'],
            ['Dimas Prayoga', 'LITBANG'],
            ['Anisa Rahmawati', 'ADVOKESMA'],
            ['Zidan Maulana', 'PIT'],
            ['Tiara Maharani', 'KESTARI'],
            ['Kevin Sanjaya', 'PSDM'],
            ['Ahmad Fauzan', 'LITBANG'],
            ['Nabila Azzahra', 'HUMAS'],
            ['Daffa Raditya', 'PIT'],
            ['Siti Nurhaliza', 'MEDKOMINFO'],
            ['Rizky Ramadhan', 'ADVOKESMA'],
            ['Alifa Zahra', 'KESTARI'],
            ['Bintang Pratama', 'PSDM'],
            ['Syifa Aulia', 'HUMAS'],
            ['Rafi Akbar', 'PIT'],
            ['Maya Safitri', 'LITBANG'],
            ['Ilham Wahyudi', 'MEDKOMINFO'],
            ['Putri Lestari', 'KESTARI'],
            ['Aditya Nugraha', 'PSDM'],
            ['Dewi Sartika', 'ADVOKESMA'],
            ['Fikri Hidayat', 'HUMAS'],
            ['Melati Kusuma', 'LITBANG'],
            ['Arif Rachman', 'PIT'],
            ['Salma Farida', 'MEDKOMINFO'],
            ['Wildan Firdaus', 'PSDM'],
            ['Intan Permata', 'KESTARI'],
            ['Hendra Saputra', 'ADVOKESMA'],
            ['Gita Gutawa', 'HUMAS'],
            ['Bima Sakti', 'PIT'],
            ['Nadia Vega', 'LITBANG'],
            ['Farhan Maulana', 'MEDKOMINFO'],
            ['Cynthia Bella', 'BPH'],
        ];

        foreach ($namaLunas as $nl) {
            IuranPengurus::create([
                'nama_anggota' => $nl[0],
                'divisi' => $nl[1],
                'periode' => 'Mei 2026',
                'nominal' => 60000,
                'status' => 'lunas',
                'tanggal_bayar' => '2026-05-05',
            ]);
        }

        // 8 additional Belum Lunas (total 9 belum, so 41 lunas + 9 belum = 50 total)
        $namaBelum = [
            ['Galang Pratama', 'HUMAS'],
            ['Rendy Pangalila', 'PIT'],
            ['Tasya Kamila', 'MEDKOMINFO'],
            ['Gilang Ramadhan', 'ADVOKESMA'],
            ['Vina Panduwinata', 'LITBANG'],
            ['Doni Salmanan', 'PSDM'],
            ['Chelsea Olivia', 'HUMAS'],
            ['Bryan Domani', 'PIT'],
        ];

        foreach ($namaBelum as $nb) {
            IuranPengurus::create([
                'nama_anggota' => $nb[0],
                'divisi' => $nb[1],
                'periode' => 'Mei 2026',
                'nominal' => 60000,
                'status' => 'belum',
                'tanggal_bayar' => null,
            ]);
        }
    }
}
