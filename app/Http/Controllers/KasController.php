<?php

namespace App\Http\Controllers;

use App\Models\IuranPengurus;
use App\Models\ProgramKerja;
use App\Models\TransaksiKas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KasController extends Controller
{
    /**
     * Display a listing of the cash management dashboard & transactions.
     */
    public function index(Request $request): View
    {
        $jenisFilter = $request->get('jenis', 'semua');
        $search = $request->get('search');
        $kategoriFilter = $request->get('kategori');

        // Query for Buku Mutasi
        $query = TransaksiKas::with('programKerja')->orderBy('tanggal', 'desc');

        if ($jenisFilter === 'masuk') {
            $query->where('jenis', 'masuk');
        } elseif ($jenisFilter === 'keluar') {
            $query->where('jenis', 'keluar');
        }

        if ($kategoriFilter) {
            $query->where('kategori', $kategoriFilter);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('deskripsi', 'like', "%{$search}%")
                  ->orWhere('pihak_terkait', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%");
            });
        }

        $transaksiList = $query->paginate(15)->withQueryString();

        // Exact financial metrics calculated dynamically from database
        $totalMasuk = (float) TransaksiKas::where('jenis', 'masuk')->sum('nominal');
        $totalKeluar = (float) TransaksiKas::where('jenis', 'keluar')->sum('nominal');
        $saldoAwal = 0.0;
        $saldoAkhir = $saldoAwal + $totalMasuk - $totalKeluar;

        // Breakdown categories for Inflow card
        $inflowIuran = (float) TransaksiKas::where('jenis', 'masuk')->where('kategori', 'Iuran Kas Pengurus')->sum('nominal');
        $inflowDanus = (float) TransaksiKas::where('jenis', 'masuk')->where('kategori', 'Sponsorship & Danus')->sum('nominal');

        // Breakdown categories for Outflow card
        $outflowAtk = (float) TransaksiKas::where('jenis', 'keluar')->where('kategori', 'Operasional & ATK')->sum('nominal');
        $outflowPleno = (float) TransaksiKas::where('jenis', 'keluar')->where('kategori', 'Konsumsi Rapat Pleno')->sum('nominal');

        // Counts for tabs
        $countSemua = TransaksiKas::count();
        $countMasuk = TransaksiKas::where('jenis', 'masuk')->count();
        $countKeluar = TransaksiKas::where('jenis', 'keluar')->count();

        // Arus Kas Mingguan (Mei 2026)
        $mingguan = [];
        for ($w = 1; $w <= 4; $w++) {
            $in = (float) TransaksiKas::where('jenis', 'masuk')->where('minggu_ke', $w)->sum('nominal');
            $out = (float) TransaksiKas::where('jenis', 'keluar')->where('minggu_ke', $w)->sum('nominal');
            $mingguan[$w] = [
                'inflow' => $in,
                'outflow' => $out,
                'inflow_formatted' => 'Rp ' . number_format($in, 0, ',', '.'),
                'outflow_formatted' => 'Rp ' . number_format($out, 0, ',', '.'),
            ];
        }

        // Iuran Pengurus stats
        $totalPengurus = IuranPengurus::count();
        $lunasPengurus = IuranPengurus::where('status', 'lunas')->count();
        $belumLunasPengurus = $totalPengurus - $lunasPengurus;
        $persenIuran = $totalPengurus > 0 ? round(($lunasPengurus / $totalPengurus) * 100) : 0;
        $terkumpulIuran = $lunasPengurus * 60000;
        $sisaIuran = $belumLunasPengurus * 60000;

        // Representative pengurus list for widget
        $pinnedPengurus = IuranPengurus::whereIn('nama_anggota', [
            'Rani Pratama',
            'Fakhri Al-Ghafiqi',
            'Bagas Raditya'
        ])->orderBy('id')->get();

        $allPengurus = IuranPengurus::orderBy('nama_anggota')->get();

        // Available program kerjas for dropdown
        $programKerjas = ProgramKerja::orderBy('nama')->get();

        return view('kas.index', compact(
            'transaksiList',
            'totalMasuk',
            'totalKeluar',
            'saldoAkhir',
            'inflowIuran',
            'inflowDanus',
            'outflowAtk',
            'outflowPleno',
            'countSemua',
            'countMasuk',
            'countKeluar',
            'mingguan',
            'totalPengurus',
            'lunasPengurus',
            'belumLunasPengurus',
            'persenIuran',
            'terkumpulIuran',
            'sisaIuran',
            'pinnedPengurus',
            'allPengurus',
            'programKerjas',
            'jenisFilter',
            'search',
            'kategoriFilter'
        ));
    }

    /**
     * Store a newly created transaction.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string|max:255',
            'pihak_terkait' => 'required|string|max:255',
            'jenis' => 'required|in:masuk,keluar',
            'kategori' => 'required|string|max:100',
            'nominal' => 'required|numeric|min:1',
            'program_kerja_id' => 'nullable|exists:program_kerjas,id',
            'bukti_transaksi' => 'nullable|string|max:255',
        ]);

        // Determine minggu_ke automatically based on date day
        $day = (int) date('d', strtotime($validated['tanggal']));
        if ($day <= 7) {
            $minggu = 1;
        } elseif ($day <= 14) {
            $minggu = 2;
        } elseif ($day <= 21) {
            $minggu = 3;
        } else {
            $minggu = 4;
        }

        $validated['minggu_ke'] = $minggu;

        TransaksiKas::create($validated);

        return redirect()->route('kas.index')->with('success', 'Transaksi kas berhasil dicatat dan saldo telah diperbarui!');
    }

    /**
     * Update the specified transaction.
     */
    public function update(Request $request, TransaksiKas $ka): RedirectResponse
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string|max:255',
            'pihak_terkait' => 'required|string|max:255',
            'jenis' => 'required|in:masuk,keluar',
            'kategori' => 'required|string|max:100',
            'nominal' => 'required|numeric|min:1',
            'program_kerja_id' => 'nullable|exists:program_kerjas,id',
            'bukti_transaksi' => 'nullable|string|max:255',
        ]);

        $day = (int) date('d', strtotime($validated['tanggal']));
        $validated['minggu_ke'] = $day <= 7 ? 1 : ($day <= 14 ? 2 : ($day <= 21 ? 3 : 4));

        $ka->update($validated);

        return redirect()->route('kas.index')->with('success', 'Data transaksi kas berhasil diperbarui!');
    }

    /**
     * Remove the specified transaction.
     */
    public function destroy(TransaksiKas $ka): RedirectResponse
    {
        $ka->delete();

        return redirect()->route('kas.index')->with('success', 'Transaksi kas berhasil dihapus!');
    }

    /**
     * Toggle or update member dues payment status.
     */
    public function updateIuran(Request $request, IuranPengurus $iuran): RedirectResponse
    {
        $status = $request->input('status', $iuran->status === 'lunas' ? 'belum' : 'lunas');
        $iuran->update([
            'status' => $status,
            'tanggal_bayar' => $status === 'lunas' ? now()->toDateString() : null,
        ]);

        return redirect()->route('kas.index')->with('success', "Status iuran {$iuran->nama_anggota} berhasil diperbarui!");
    }
}
