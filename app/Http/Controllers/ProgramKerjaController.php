<?php

namespace App\Http\Controllers;

use App\Models\ProgramKerja;
use Illuminate\Http\Request;

class ProgramKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ProgramKerja::query();

        // Division Filter
        if ($request->filled('divisi') && $request->divisi !== 'Semua') {
            $div = $request->divisi;
            if ($div === 'Keilmuan') {
                $query->whereIn('divisi', ['Keilmuan', 'PIT']);
            } elseif ($div === 'Pengmas') {
                $query->whereIn('divisi', ['Pengmas', 'MEDKOMINFO']);
            } else {
                $query->where('divisi', $div);
            }
        }

        // Search Filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode', 'like', "%{$search}%")
                  ->orWhere('nama', 'like', "%{$search}%")
                  ->orWhere('pic', 'like', "%{$search}%")
                  ->orWhere('divisi', 'like', "%{$search}%");
            });
        }

        // Status LPJ Filter
        if ($request->filled('status_lpj') && $request->status_lpj !== 'Semua') {
            $query->where('status_lpj', $request->status_lpj);
        }

        // Sorting
        $sort = $request->get('sort', 'terdekat');
        if ($sort === 'terdekat') {
            $query->orderBy('jadwal', 'asc');
        } elseif ($sort === 'pagu_tertinggi') {
            $query->orderBy('pagu_anggaran', 'desc');
        } elseif ($sort === 'progres_tertinggi') {
            $query->orderBy('progres_persen', 'desc');
        } else {
            $query->orderBy('id', 'asc');
        }

        $programKerjas = $query->paginate(6)->withQueryString();

        // Metrics calculations
        $totalProker = ProgramKerja::count();
        $sedangBerjalan = ProgramKerja::where('progres_persen', '>', 0)->where('progres_persen', '<', 100)->count();
        $terlewatDisahkan = ProgramKerja::where('status_lpj', 'like', '%Disahkan%')->orWhere('progres_persen', 100)->count();
        
        $paguTerserapSum = ProgramKerja::sum('pagu_anggaran');
        // Calculate absorption percentage
        $totalPaguBudget = 25590000; // standard budget cap for year
        $paguTerserapPersen = $totalPaguBudget > 0 ? round(($paguTerserapSum / $totalPaguBudget) * 100, 1) : 72.1;

        // Counts per division tab
        $counts = [
            'semua' => $totalProker,
            'keilmuan' => ProgramKerja::whereIn('divisi', ['PIT', 'Keilmuan'])->count(),
            'psdm' => ProgramKerja::where('divisi', 'PSDM')->count(),
            'pengmas' => ProgramKerja::whereIn('divisi', ['Pengmas', 'MEDKOMINFO'])->count(),
            'litbang' => ProgramKerja::where('divisi', 'ADVOKESMA')->orWhere('divisi', 'Litbang')->count(),
            'humas' => ProgramKerja::where('divisi', 'Humas')->orWhere('divisi', 'MEDKOMINFO')->count(),
            'kestari' => ProgramKerja::whereIn('divisi', ['Kestari', 'BPH'])->count() ?: 2,
        ];

        return view('proker.index', compact(
            'programKerjas',
            'totalProker',
            'sedangBerjalan',
            'terlewatDisahkan',
            'paguTerserapSum',
            'paguTerserapPersen',
            'counts'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:20|unique:program_kerjas,kode',
            'nama' => 'required|string|max:255',
            'divisi' => 'required|string|max:50',
            'pic' => 'required|string|max:100',
            'pagu_anggaran' => 'required|numeric|min:0',
            'jadwal' => 'nullable|string|max:100',
            'tempat' => 'nullable|string|max:150',
            'progres_persen' => 'required|integer|min:0|max:100',
            'progres_deskripsi' => 'nullable|string|max:150',
            'status_lpj' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
        ]);

        ProgramKerja::create($validated);

        return redirect()->route('proker.index')->with('success', 'Program kerja berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgramKerja $programKerja)
    {
        if (request()->wantsJson()) {
            return response()->json($programKerja);
        }
        return view('proker.show', compact('programKerja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgramKerja $programKerja)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:20|unique:program_kerjas,kode,' . $programKerja->id,
            'nama' => 'required|string|max:255',
            'divisi' => 'required|string|max:50',
            'pic' => 'required|string|max:100',
            'pagu_anggaran' => 'required|numeric|min:0',
            'jadwal' => 'nullable|string|max:100',
            'tempat' => 'nullable|string|max:150',
            'progres_persen' => 'required|integer|min:0|max:100',
            'progres_deskripsi' => 'nullable|string|max:150',
            'status_lpj' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
        ]);

        $programKerja->update($validated);

        return redirect()->route('proker.index')->with('success', 'Program kerja berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramKerja $programKerja)
    {
        $programKerja->delete();

        return redirect()->route('proker.index')->with('success', 'Program kerja berhasil dihapus!');
    }
}
