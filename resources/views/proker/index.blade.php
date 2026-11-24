<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=1512, height=982, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>KEMUDI | Manajemen Program Kerja - Kabinet Imaginera</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
          },
          colors: {
            kemudi: {
              50: '#f0fdf4',
              100: '#dcfce7',
              200: '#bbf7d0',
              300: '#86efac',
              400: '#4ade80',
              500: '#22c55e',
              600: '#16a34a',
              700: '#15803d',
              800: '#166534',
              900: '#14532d',
              dark: '#0e3a20',
            }
          }
        }
      }
    }
  </script>

  <style>
    * {
      box-sizing: border-box;
      -webkit-font-smoothing: antialiased;
    }
    html, body {
      width: 1512px;
      height: 982px;
      max-height: 982px;
      overflow: hidden;
      margin: 0;
      padding: 0;
      background-color: #F8FAFC;
      color: #1E293B;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .badge-dot {
      width: 6px;
      height: 6px;
      border-radius: 50%;
      display: inline-block;
    }
    /* Hide scrollbar for clean UI */
    ::-webkit-scrollbar {
      width: 0px;
      height: 0px;
    }
  </style>
</head>
<body>

  <!-- Toast Notification -->
  @if(session('success'))
    <div id="toast-success" class="fixed top-5 right-5 z-50 flex items-center gap-3 px-4 py-3 bg-[#14532d] text-white text-xs font-bold rounded-xl shadow-lg border border-emerald-500/30 transition-all duration-300">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
      <span>{{ session('success') }}</span>
      <button onclick="document.getElementById('toast-success').remove()" class="text-white/80 hover:text-white ml-2">✕</button>
    </div>
  @endif

  <!-- Root Canvas: EXACTLY 1512px x 982px -->
  <div style="width: 1512px; height: 982px;" class="flex bg-[#F8FAFC] overflow-hidden">

    <!-- ==================== SIDEBAR (260px x 982px) ==================== -->
    <aside style="width: 260px; height: 982px;" class="bg-white border-r border-slate-200/80 flex flex-col justify-between shrink-0 p-5">
      <div>
        <!-- Top Logo (KEMUDI with integrated KBMDSI compass icon) -->
        <div class="pb-4 border-b border-slate-100 flex items-center gap-3">
          <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-[#0e3a20] to-emerald-600 flex items-center justify-center text-white shadow-md shrink-0">
            <svg width="22" height="22" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="20" cy="20" r="14" stroke="white" stroke-width="2.8" />
              <!-- Upper Chevron Wings (Lime Green) -->
              <path d="M 14 13 L 20 18 L 18 20 L 12 15 Z" fill="#bef264" />
              <path d="M 26 13 L 20 18 L 22 20 L 28 15 Z" fill="#84cc16" />
              <!-- Lower Chevron Wings (Teal/Emerald) -->
              <path d="M 12 25 L 18 20 L 20 22 L 14 27 Z" fill="#047857" />
              <path d="M 28 25 L 22 20 L 20 22 L 26 27 Z" fill="#14b8a6" />
              <circle cx="20" cy="20" r="1.5" fill="white" />
            </svg>
          </div>
          <div>
            <div class="font-extrabold text-sm tracking-tight text-slate-900 leading-none">KEMUDI</div>
            <p class="text-[10px] font-medium text-slate-400 mt-1">Kabinet Imaginera 2026/2027</p>
          </div>
        </div>

        <!-- Navigation Menu -->
        <div class="py-4">
          <p class="px-3 text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">NAVIGASI UTAMA</p>
          <nav class="space-y-1 text-xs">
            
            <a href="{{ route('home') }}" class="w-full flex items-center gap-3 px-3 py-2 rounded-xl font-semibold text-slate-600 hover:bg-slate-50">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-slate-400">
                <rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect>
                <rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect>
              </svg>
              <span>Dashboard</span>
            </a>

            <!-- Active: Manajemen Proker -->
            <a href="{{ route('proker.index') }}" class="w-full flex items-center justify-between px-3 py-2 rounded-xl font-bold bg-[#14532d] text-white shadow-sm">
              <div class="flex items-center gap-3">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" class="text-white">
                  <path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path><path d="m9 16 2 2 4-4"></path>
                </svg>
                <span>Manajemen Proker</span>
              </div>
              <span class="text-[9px] bg-white/20 text-white font-bold px-2 py-0.5 rounded-full">{{ $totalProker }}</span>
            </a>

            <a href="{{ route('kas.index') }}" class="w-full flex items-center gap-3 px-3 py-2 rounded-xl font-semibold text-slate-600 hover:bg-slate-50">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-slate-400">
                <rect width="20" height="14" x="2" y="5" rx="2"></rect><line x1="2" x2="22" y1="10" y2="10"></line>
              </svg>
              <span>Kas & Keuangan</span>
            </a>

            <a href="#" class="w-full flex items-center gap-3 px-3 py-2 rounded-xl font-semibold text-slate-600 hover:bg-slate-50">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-slate-400">
                <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><path d="m9 15 2 2 4-4"></path>
              </svg>
              <span>Pengajuan LPJ / LAK</span>
            </a>

            <a href="#" class="w-full flex items-center gap-3 px-3 py-2 rounded-xl font-semibold text-slate-600 hover:bg-slate-50">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-slate-400">
                <circle cx="12" cy="8" r="5"></circle><path d="M20 21a8 8 0 1 0-16 0"></path>
              </svg>
              <span>Halaman Profil</span>
            </a>

          </nav>
        </div>
      </div>

      <!-- Bottom Profile Card (Clean - matching Image 1) -->
      <div class="pt-3 border-t border-slate-100">
        <div class="flex items-center gap-2.5 p-2 rounded-xl bg-white border border-slate-200/80 shadow-xs">
          <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=120&h=120&q=80" 
               alt="Rani" 
               class="w-8 h-8 rounded-full object-cover border border-emerald-600 ring-2 ring-emerald-50" />
          <div class="overflow-hidden flex-1 text-xs">
            <div class="font-bold text-slate-900 truncate text-[11px]">Rani Pratama</div>
            <div class="text-[9px] text-slate-400 truncate">Sekretaris 1 BPH KBMDSI</div>
          </div>
        </div>
      </div>
    </aside>

    <!-- ==================== MAIN CONTENT (1252px x 982px) ==================== -->
    <div style="width: 1252px; height: 982px;" class="flex flex-col bg-[#F8FAFC]">
      
      <!-- Top Header Bar (56px) - Clean matching Image 1 -->
      <header style="height: 56px;" class="px-7 bg-white border-b border-slate-200/80 flex items-center justify-between shrink-0">
        <form method="GET" action="{{ route('proker.index') }}" class="w-88 relative">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-slate-400 absolute left-3 top-1/2 -translate-y-1/2">
            <circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
          <input type="text" 
                 name="search"
                 value="{{ request('search') }}"
                 placeholder="Cari program kerja, bukti ka" 
                 class="w-full pl-9 pr-3 py-1.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-1 focus:ring-emerald-700 focus:bg-white transition-all">
        </form>

        <div class="flex items-center gap-4">
          <div class="relative p-1.5 text-slate-500 hover:text-slate-800 rounded-xl cursor-pointer">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
            </svg>
            <span class="absolute top-1 right-1 w-1.5 h-1.5 rounded-full bg-rose-500"></span>
          </div>

          <div class="flex items-center gap-2">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=120&h=120&q=80" 
                 alt="Rani" 
                 class="w-7 h-7 rounded-full object-cover border border-emerald-600 ring-2 ring-emerald-50" />
            <div class="text-left text-xs">
              <span class="font-bold text-slate-900 text-[11px]">Rani Pratama</span>
            </div>
          </div>
        </div>
      </header>

      <!-- Exact Height Main Container (926px = 982px - 56px) -->
      <main style="height: 926px;" class="p-6 flex flex-col justify-between overflow-hidden">
        
        <!-- Section 1: Page Header -->
        <div class="flex items-center justify-between shrink-0">
          <div>
            <div class="flex items-center gap-1.5 text-[11px] font-semibold text-slate-400 mb-0.5">
              <span>Kabinet Imaginera</span>
              <span>›</span>
              <span>KBMDSI FILKOM UB</span>
              <span>›</span>
              <span class="text-emerald-800 font-bold">Manajemen Program Kerja</span>
            </div>
            <h1 class="text-xl font-extrabold text-slate-900 tracking-tight">Manajemen Program Kerja</h1>
            <p class="text-[11px] text-slate-500 mt-0.5 leading-tight">
              Pusat kendali eksekusi kegiatan, sinkronisasi progres panitia, monitoring birokrasi persetujuan DPA, serta transparansi penyerapan anggaran tahun kerja berjalan.
            </p>
          </div>

          <div class="flex items-center gap-2.5 shrink-0">
            <button onclick="window.print()" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold rounded-xl shadow-xs transition-all">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-slate-500">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line>
              </svg>
              <span>Ekspor Rekap (XLS / PDF)</span>
            </button>
            <button onclick="openModalCreate()" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-[#14532d] hover:bg-emerald-950 text-white text-xs font-bold rounded-xl shadow-sm transition-all cursor-pointer">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line>
              </svg>
              <span>+ Tambah Proker Baru</span>
            </button>
          </div>
        </div>

        <!-- Section 2: 4 Metric Cards Row (~95px) -->
        <div class="grid grid-cols-4 gap-4 shrink-0">
          
          <!-- Card 1: Total Proker -->
          <div class="bg-white rounded-xl p-3.5 border border-slate-200/80 shadow-xs flex flex-col justify-between">
            <div class="flex items-center justify-between">
              <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">TOTAL PROGRAM KERJA</span>
              <div class="w-7 h-7 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
              </div>
            </div>
            <div class="mt-1.5">
              <div class="text-2xl font-extrabold text-slate-900 leading-none">{{ str_pad($totalProker, 2, '0', STR_PAD_LEFT) }}</div>
              <div class="flex items-center gap-1 mt-1.5 text-[11px] font-medium text-slate-500">
                <span class="badge-dot bg-emerald-500"></span>
                <span>100% Terverifikasi Draf DPA</span>
              </div>
            </div>
          </div>

          <!-- Card 2: Sedang Berjalan -->
          <div class="bg-white rounded-xl p-3.5 border border-slate-200/80 shadow-xs flex flex-col justify-between">
            <div class="flex items-center justify-between">
              <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">SEDANG BERJALAN</span>
              <div class="w-7 h-7 rounded-lg bg-cyan-50 text-cyan-600 flex items-center justify-center">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline>
                </svg>
              </div>
            </div>
            <div class="mt-1.5">
              <div class="text-2xl font-extrabold text-slate-900 leading-none">{{ str_pad($sedangBerjalan, 2, '0', STR_PAD_LEFT) }}</div>
              <div class="flex items-center gap-1 mt-1.5 text-[11px] font-medium text-slate-500">
                <span class="font-semibold text-cyan-700">Fase Aktif:</span>
                <span>7 Persiapan, 1 Lapangan</span>
              </div>
            </div>
          </div>

          <!-- Card 3: Terlewat / Disahkan -->
          <div class="bg-white rounded-xl p-3.5 border border-slate-200/80 shadow-xs flex flex-col justify-between">
            <div class="flex items-center justify-between">
              <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">TERLEWAT / DISAHKAN</span>
              <div class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
              </div>
            </div>
            <div class="mt-1.5">
              <div class="text-2xl font-extrabold text-slate-900 leading-none">{{ str_pad($terlewatDisahkan, 2, '0', STR_PAD_LEFT) }}</div>
              <div class="flex items-center gap-1 mt-1.5 text-[11px] font-medium text-slate-500">
                <span class="font-semibold text-emerald-700">Paripurna DPA:</span>
                <span>4 Terevaluasi</span>
              </div>
            </div>
          </div>

          <!-- Card 4: Pagu Terserap -->
          <a href="{{ route('kas.index') }}" class="bg-white rounded-xl p-3.5 border border-slate-200/80 shadow-xs hover:border-emerald-300 transition-all flex flex-col justify-between group">
            <div class="flex items-center justify-between">
              <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 group-hover:text-emerald-800 transition-colors">PAGU TERSERAP</span>
              <div class="w-7 h-7 rounded-lg bg-lime-50 text-lime-700 flex items-center justify-center group-hover:bg-emerald-100 transition-colors">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                </svg>
              </div>
            </div>
            <div class="mt-1.5">
              <div class="text-2xl font-extrabold text-slate-900 leading-none">{{ $paguTerserapPersen }}%</div>
              <div class="flex items-center justify-between mt-1.5 text-[11px] font-medium text-slate-500">
                <span>Rp {{ number_format($paguTerserapSum, 0, ',', '.') }} <span class="text-slate-400">/ 25.59M</span></span>
                <span class="text-[10px] font-bold text-emerald-700">Buku Kas ↗</span>
              </div>
            </div>
          </a>

        </div>

        <!-- Section 3: Banner SOP LPJ/LAK (~76px) -->
        <div class="rounded-xl bg-[#14532d] p-4 text-white shadow-sm flex items-center justify-between shrink-0">
          <div class="flex items-center gap-3.5">
            <div class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-emerald-200">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
              </svg>
            </div>
            <div>
              <div class="flex items-center gap-2">
                <h3 class="text-xs font-extrabold text-white tracking-tight">Kepatuhan Standar Operasional Prosedur (SOP) LPJ/LAK</h3>
                <span class="text-[9px] font-extrabold bg-emerald-400/20 text-emerald-200 border border-emerald-400/30 px-2 py-0.5 rounded-full uppercase tracking-wider">TELITI & TEPAT</span>
              </div>
              <p class="text-[11px] text-emerald-100/90 mt-0.5 max-w-3xl leading-snug">
                Sesuai ketetapan Kongres DPA KBMDSI FILKOM UB Bab IV Pasal 12, seluruh kepanitiaan pelaksana wajib melampirkan berkas fisik & digital LPJ maksimal 14 hari kalender pasca hari terakhir acara untuk menjamin pencairan termin berikutnya.
              </p>
            </div>
          </div>

          <div class="flex items-center gap-2.5 shrink-0">
            <button onclick="alert('Standar Operasional Prosedur (SOP) LPJ/LAK KBMDSI FILKOM UB Tahun 2026/2027')" class="px-3 py-1.5 bg-white/10 hover:bg-white/20 border border-white/30 text-white rounded-lg text-xs font-bold transition-all">
              Baca SOP Lengkap
            </button>
            <button onclick="openModalCreate()" class="px-3 py-1.5 bg-white hover:bg-emerald-50 text-emerald-950 rounded-lg text-xs font-bold shadow-sm transition-all">
              Unggah Draft LPJ
            </button>
          </div>
        </div>

        <!-- Section 4: Main Proker Table Card (Fits Exactly to 982px Viewport) -->
        <div class="bg-white rounded-xl border border-slate-200/80 shadow-xs overflow-hidden flex flex-col justify-between shrink-0">
          
          <!-- Division Tabs -->
          <div class="px-4 py-2.5 border-b border-slate-100 flex items-center gap-2 text-xs font-bold">
            <a href="{{ route('proker.index') }}" 
               class="px-3.5 py-1 rounded-full text-[11px] {{ !request('divisi') || request('divisi') === 'Semua' ? 'bg-[#14532d] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
              Semua Divisi ({{ $counts['semua'] }})
            </a>
            <a href="{{ route('proker.index', ['divisi' => 'Keilmuan']) }}" 
               class="px-3.5 py-1 rounded-full text-[11px] {{ request('divisi') === 'Keilmuan' ? 'bg-[#14532d] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
              Keilmuan ({{ $counts['keilmuan'] }})
            </a>
            <a href="{{ route('proker.index', ['divisi' => 'PSDM']) }}" 
               class="px-3.5 py-1 rounded-full text-[11px] {{ request('divisi') === 'PSDM' ? 'bg-[#14532d] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
              PSDM ({{ $counts['psdm'] }})
            </a>
            <a href="{{ route('proker.index', ['divisi' => 'Pengmas']) }}" 
               class="px-3.5 py-1 rounded-full text-[11px] {{ request('divisi') === 'Pengmas' ? 'bg-[#14532d] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
              Pengmas ({{ $counts['pengmas'] }})
            </a>
            <a href="{{ route('proker.index', ['divisi' => 'ADVOKESMA']) }}" 
               class="px-3.5 py-1 rounded-full text-[11px] {{ request('divisi') === 'ADVOKESMA' ? 'bg-[#14532d] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
              Litbang ({{ $counts['litbang'] }})
            </a>
            <a href="{{ route('proker.index', ['divisi' => 'MEDKOMINFO']) }}" 
               class="px-3.5 py-1 rounded-full text-[11px] {{ request('divisi') === 'MEDKOMINFO' ? 'bg-[#14532d] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
              Humas ({{ $counts['humas'] }})
            </a>
            <a href="{{ route('proker.index', ['divisi' => 'Kestari']) }}" 
               class="px-3.5 py-1 rounded-full text-[11px] {{ request('divisi') === 'Kestari' ? 'bg-[#14532d] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
              Kestari / BPH ({{ $counts['kestari'] }})
            </a>
          </div>

          <!-- Filter & Search Row -->
          <form method="GET" action="{{ route('proker.index') }}" class="px-5 py-2.5 bg-slate-50/70 border-b border-slate-100 flex items-center justify-between gap-3 text-xs">
            @if(request('divisi'))
              <input type="hidden" name="divisi" value="{{ request('divisi') }}">
            @endif

            <div class="w-80 relative">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-slate-400 absolute left-3 top-1/2 -translate-y-1/2">
                <circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
              </svg>
              <input type="text" 
                     name="search" 
                     value="{{ request('search') }}"
                     placeholder="Cari kode, nama proker, atau PIC..." 
                     onchange="this.form.submit()"
                     class="w-full pl-8 pr-3 py-1 bg-white border border-slate-200 rounded-lg text-xs font-medium text-slate-700 focus:outline-none focus:ring-1 focus:ring-emerald-700">
            </div>

            <div class="flex items-center gap-2">
              <select name="status_lpj" onchange="this.form.submit()" class="px-2.5 py-1 bg-white border border-slate-200 rounded-lg text-xs font-medium text-slate-700 cursor-pointer">
                <option value="Semua" {{ request('status_lpj') === 'Semua' ? 'selected' : '' }}>Semua Status LPJ/LAK</option>
                <option value="Draft H-2 Acara" {{ request('status_lpj') === 'Draft H-2 Acara' ? 'selected' : '' }}>Draft H-2 Acara</option>
                <option value="Belum Terbit" {{ request('status_lpj') === 'Belum Terbit' ? 'selected' : '' }}>Belum Terbit</option>
                <option value="Tahap Proposal" {{ request('status_lpj') === 'Tahap Proposal' ? 'selected' : '' }}>Tahap Proposal</option>
                <option value="✓ Disahkan DPA (Paripurna)" {{ request('status_lpj') === '✓ Disahkan DPA (Paripurna)' ? 'selected' : '' }}>Disahkan DPA</option>
                <option value="Review DPA" {{ request('status_lpj') === 'Review DPA' ? 'selected' : '' }}>Review DPA</option>
                <option value="Review Proposal" {{ request('status_lpj') === 'Review Proposal' ? 'selected' : '' }}>Review Proposal</option>
              </select>

              <select name="sort" onchange="this.form.submit()" class="px-2.5 py-1 bg-white border border-slate-200 rounded-lg text-xs font-medium text-slate-700 cursor-pointer">
                <option value="terdekat" {{ request('sort') === 'terdekat' ? 'selected' : '' }}>Urutkan: Jadwal Terdekat</option>
                <option value="pagu_tertinggi" {{ request('sort') === 'pagu_tertinggi' ? 'selected' : '' }}>Urutkan: Pagu Tertinggi</option>
                <option value="progres_tertinggi" {{ request('sort') === 'progres_tertinggi' ? 'selected' : '' }}>Urutkan: Progres Tertinggi</option>
              </select>
            </div>
          </form>

          <!-- Table Content (Rendered Dynamically from DB) -->
          <table class="w-full text-left border-collapse text-xs">
            <thead>
              <tr class="border-b border-slate-100 text-[10px] font-bold text-slate-400 uppercase bg-slate-50/50">
                <th class="py-2.5 px-5">KODE & NAMA PROGRAM</th>
                <th class="py-2.5 px-5">DIVISI & PIC</th>
                <th class="py-2.5 px-5">JADWAL & TEMPAT</th>
                <th class="py-2.5 px-5">PROGRES EKSEKUSI</th>
                <th class="py-2.5 px-5">STATUS LPJ / LAK</th>
                <th class="py-2.5 px-5 text-right">AKSI</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
              
              @forelse($programKerjas as $proker)
                <tr class="hover:bg-slate-50/80 transition-colors group">
                  <!-- Col 1: Kode & Nama -->
                  <td class="py-2.5 px-5">
                    <div class="flex items-center gap-2.5">
                      <span class="w-7 h-7 rounded-lg bg-slate-100 text-slate-700 font-extrabold text-[11px] flex items-center justify-center border border-slate-200/60 shrink-0">
                        {{ $proker->prefix }}
                      </span>
                      <div>
                        <div class="font-extrabold text-slate-900 text-xs flex items-center gap-1.5">
                          <span>{{ $proker->nama }}</span>
                          <span class="text-[9px] font-mono px-1 py-0.2 rounded bg-slate-100 text-slate-500">{{ $proker->kode }}</span>
                        </div>
                        <div class="text-[10px] text-slate-400">Pagu: <strong class="text-slate-700">{{ $proker->formatted_pagu }}</strong></div>
                      </div>
                    </div>
                  </td>

                  <!-- Col 2: Divisi & PIC -->
                  <td class="py-2.5 px-5">
                    <div class="font-bold text-slate-800 text-xs">{{ $proker->divisi }}</div>
                    <div class="text-[10px] text-slate-500">{{ $proker->pic }}</div>
                  </td>

                  <!-- Col 3: Jadwal & Tempat -->
                  <td class="py-2.5 px-5">
                    <div class="font-bold text-slate-800 text-xs">{{ $proker->jadwal }}</div>
                    <div class="text-[10px] text-slate-500">{{ $proker->tempat }}</div>
                  </td>

                  <!-- Col 4: Progres Eksekusi -->
                  <td class="py-2.5 px-5 w-40">
                    <div class="text-[10px] font-semibold text-slate-700 mb-1">{{ $proker->progres_persen }}% - {{ $proker->progres_deskripsi }}</div>
                    <div class="w-full bg-slate-100 rounded-full h-1.5">
                      <div class="bg-emerald-600 h-1.5 rounded-full" style="width: {{ $proker->progres_persen }}%"></div>
                    </div>
                  </td>

                  <!-- Col 5: Status LPJ/LAK -->
                  <td class="py-2.5 px-5">
                    @php
                      $status = $proker->status_lpj;
                      $badgeClass = 'bg-slate-100 text-slate-600 border-slate-200';
                      $dotClass = 'bg-slate-400';
                      
                      if (str_contains($status, 'Draft H-2')) {
                          $badgeClass = 'bg-cyan-50 text-cyan-700 border-cyan-200';
                          $dotClass = 'bg-cyan-500';
                      } elseif (str_contains($status, 'Tahap Proposal')) {
                          $badgeClass = 'bg-blue-50 text-blue-700 border-blue-200';
                          $dotClass = 'bg-blue-500';
                      } elseif (str_contains($status, 'Disahkan')) {
                          $badgeClass = 'bg-emerald-50 text-emerald-800 border-emerald-300';
                          $dotClass = 'bg-emerald-600';
                      } elseif (str_contains($status, 'Review DPA')) {
                          $badgeClass = 'bg-amber-50 text-amber-800 border-amber-200';
                          $dotClass = 'bg-amber-500';
                      } elseif (str_contains($status, 'Review Proposal')) {
                          $badgeClass = 'bg-purple-50 text-purple-700 border-purple-200';
                          $dotClass = 'bg-purple-500';
                      }
                    @endphp

                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold border flex items-center gap-1 w-fit {{ $badgeClass }}">
                      @if(str_contains($status, 'Disahkan'))
                        {{ $status }}
                      @else
                        <span class="badge-dot {{ $dotClass }}"></span> {{ $status }}
                      @endif
                    </span>
                  </td>

                  <!-- Col 6: Aksi (CRUD Buttons) -->
                  <td class="py-2.5 px-5 text-right whitespace-nowrap">
                    <div class="flex items-center justify-end gap-1.5">
                      <!-- Edit Button -->
                      <button onclick='openModalEdit(@json($proker))' title="Edit Proker" class="p-1 text-slate-400 hover:text-emerald-700 rounded hover:bg-slate-100">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                      </button>
                      
                      <!-- Delete Button -->
                      <form action="{{ route('proker.destroy', $proker) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus program kerja {{ $proker->nama }}?');" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Hapus Proker" class="p-1 text-slate-400 hover:text-rose-600 rounded hover:bg-rose-50">
                          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                        </button>
                      </form>

                      <!-- Kas Direct Link -->
                      <a href="{{ route('kas.index') }}" title="Lihat Buku Kas" class="p-1 text-slate-400 hover:text-emerald-700 font-bold inline-block">↗</a>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="py-8 text-center text-slate-400 text-xs">
                    Tidak ada program kerja yang sesuai filter.
                  </td>
                </tr>
              @endforelse

            </tbody>
          </table>

          <!-- Pagination Footer -->
          <div class="p-3 px-5 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
            <div>
              Menampilkan <strong class="text-slate-700">{{ $programKerjas->count() }}</strong> dari <strong class="text-slate-700">{{ $programKerjas->total() }}</strong> program kerja terdaftar
            </div>
            <div>
              {{ $programKerjas->links('pagination::simple-tailwind') }}
            </div>
          </div>

        </div>

      </main>

    </div>

  </div>

  <!-- ==================== MODAL CREATE / TAMBAH PROKER ==================== -->
  <div id="modal-create" class="fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-xs hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-2xl max-w-lg w-full overflow-hidden">
      <div class="p-4 px-6 bg-slate-50 border-b border-slate-100 flex items-center justify-between">
        <div>
          <h3 class="text-sm font-extrabold text-slate-900">+ Tambah Program Kerja Baru</h3>
          <p class="text-[10px] text-slate-400">Pastikan informasi pagu anggaran dan PIC sudah terkonfirmasi</p>
        </div>
        <button onclick="closeModalCreate()" class="text-slate-400 hover:text-slate-700 text-base font-bold">✕</button>
      </div>

      <form action="{{ route('proker.store') }}" method="POST" class="p-6 space-y-3.5 text-xs">
        @csrf
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-bold text-slate-700 mb-1">Kode Program *</label>
            <input type="text" name="kode" required placeholder="misal: KL-02" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
          </div>
          <div>
            <label class="block font-bold text-slate-700 mb-1">Divisi Pelaksana *</label>
            <select name="divisi" required class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
              <option value="PIT">PIT (Keilmuan)</option>
              <option value="PSDM">PSDM</option>
              <option value="MEDKOMINFO">MEDKOMINFO</option>
              <option value="ADVOKESMA">ADVOKESMA</option>
              <option value="Humas">Humas</option>
              <option value="Kestari">Kestari / BPH</option>
            </select>
          </div>
        </div>

        <div>
          <label class="block font-bold text-slate-700 mb-1">Nama Program Kerja *</label>
          <input type="text" name="nama" required placeholder="misal: Workshop UI/UX Design 2026" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
        </div>

        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-bold text-slate-700 mb-1">Penanggung Jawab (PIC) *</label>
            <input type="text" name="pic" required placeholder="Nama PIC" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
          </div>
          <div>
            <label class="block font-bold text-slate-700 mb-1">Pagu Anggaran (Rp) *</label>
            <input type="number" name="pagu_anggaran" required placeholder="10000000" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
          </div>
        </div>

        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-bold text-slate-700 mb-1">Jadwal Pelaksanaan</label>
            <input type="text" name="jadwal" placeholder="misal: 15 - 16 Juni 2026" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
          </div>
          <div>
            <label class="block font-bold text-slate-700 mb-1">Tempat / Lokasi</label>
            <input type="text" name="tempat" placeholder="misal: Gedung G FILKOM UB" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
          </div>
        </div>

        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-bold text-slate-700 mb-1">Progres Eksekusi (%) *</label>
            <input type="number" name="progres_persen" min="0" max="100" value="0" required class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
          </div>
          <div>
            <label class="block font-bold text-slate-700 mb-1">Deskripsi Progres</label>
            <input type="text" name="progres_deskripsi" placeholder="misal: Persiapan Panitia" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
          </div>
        </div>

        <div>
          <label class="block font-bold text-slate-700 mb-1">Status LPJ / LAK *</label>
          <select name="status_lpj" required class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
            <option value="Belum Terbit">Belum Terbit</option>
            <option value="Tahap Proposal">Tahap Proposal</option>
            <option value="Review Proposal">Review Proposal</option>
            <option value="Draft H-2 Acara">Draft H-2 Acara</option>
            <option value="Review DPA">Review DPA</option>
            <option value="✓ Disahkan DPA (Paripurna)">✓ Disahkan DPA (Paripurna)</option>
          </select>
        </div>

        <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2.5">
          <button type="button" onclick="closeModalCreate()" class="px-4 py-2 border border-slate-200 rounded-xl text-slate-600 font-bold hover:bg-slate-50">Batal</button>
          <button type="submit" class="px-4 py-2 bg-[#14532d] text-white rounded-xl font-bold shadow-sm hover:bg-emerald-950">+ Simpan Proker</button>
        </div>
      </form>
    </div>
  </div>

  <!-- ==================== MODAL EDIT PROKER ==================== -->
  <div id="modal-edit" class="fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-xs hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-2xl max-w-lg w-full overflow-hidden">
      <div class="p-4 px-6 bg-slate-50 border-b border-slate-100 flex items-center justify-between">
        <div>
          <h3 class="text-sm font-extrabold text-slate-900">Edit Program Kerja</h3>
          <p class="text-[10px] text-slate-400">Perbarui progres atau informasi kegiatan</p>
        </div>
        <button onclick="closeModalEdit()" class="text-slate-400 hover:text-slate-700 text-base font-bold">✕</button>
      </div>

      <form id="form-edit" method="POST" class="p-6 space-y-3.5 text-xs">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-bold text-slate-700 mb-1">Kode Program *</label>
            <input type="text" id="edit-kode" name="kode" required class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
          </div>
          <div>
            <label class="block font-bold text-slate-700 mb-1">Divisi Pelaksana *</label>
            <select id="edit-divisi" name="divisi" required class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
              <option value="PIT">PIT (Keilmuan)</option>
              <option value="PSDM">PSDM</option>
              <option value="MEDKOMINFO">MEDKOMINFO</option>
              <option value="ADVOKESMA">ADVOKESMA</option>
              <option value="Humas">Humas</option>
              <option value="Kestari">Kestari / BPH</option>
            </select>
          </div>
        </div>

        <div>
          <label class="block font-bold text-slate-700 mb-1">Nama Program Kerja *</label>
          <input type="text" id="edit-nama" name="nama" required class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
        </div>

        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-bold text-slate-700 mb-1">Penanggung Jawab (PIC) *</label>
            <input type="text" id="edit-pic" name="pic" required class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
          </div>
          <div>
            <label class="block font-bold text-slate-700 mb-1">Pagu Anggaran (Rp) *</label>
            <input type="number" id="edit-pagu" name="pagu_anggaran" required class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
          </div>
        </div>

        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-bold text-slate-700 mb-1">Jadwal Pelaksanaan</label>
            <input type="text" id="edit-jadwal" name="jadwal" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
          </div>
          <div>
            <label class="block font-bold text-slate-700 mb-1">Tempat / Lokasi</label>
            <input type="text" id="edit-tempat" name="tempat" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
          </div>
        </div>

        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-bold text-slate-700 mb-1">Progres Eksekusi (%) *</label>
            <input type="number" id="edit-progres-persen" name="progres_persen" min="0" max="100" required class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
          </div>
          <div>
            <label class="block font-bold text-slate-700 mb-1">Deskripsi Progres</label>
            <input type="text" id="edit-progres-deskripsi" name="progres_deskripsi" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
          </div>
        </div>

        <div>
          <label class="block font-bold text-slate-700 mb-1">Status LPJ / LAK *</label>
          <select id="edit-status-lpj" name="status_lpj" required class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-slate-800 focus:ring-1 focus:ring-emerald-700">
            <option value="Belum Terbit">Belum Terbit</option>
            <option value="Tahap Proposal">Tahap Proposal</option>
            <option value="Review Proposal">Review Proposal</option>
            <option value="Draft H-2 Acara">Draft H-2 Acara</option>
            <option value="Review DPA">Review DPA</option>
            <option value="✓ Disahkan DPA (Paripurna)">✓ Disahkan DPA (Paripurna)</option>
          </select>
        </div>

        <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2.5">
          <button type="button" onclick="closeModalEdit()" class="px-4 py-2 border border-slate-200 rounded-xl text-slate-600 font-bold hover:bg-slate-50">Batal</button>
          <button type="submit" class="px-4 py-2 bg-[#14532d] text-white rounded-xl font-bold shadow-sm hover:bg-emerald-950">Perbarui Proker</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function openModalCreate() {
      const modal = document.getElementById('modal-create');
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    }

    function closeModalCreate() {
      const modal = document.getElementById('modal-create');
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    }

    function openModalEdit(proker) {
      const modal = document.getElementById('modal-edit');
      const form = document.getElementById('form-edit');
      
      form.action = `/proker/${proker.id}`;
      document.getElementById('edit-kode').value = proker.kode || '';
      document.getElementById('edit-nama').value = proker.nama || '';
      document.getElementById('edit-divisi').value = proker.divisi || 'PIT';
      document.getElementById('edit-pic').value = proker.pic || '';
      document.getElementById('edit-pagu').value = proker.pagu_anggaran || 0;
      document.getElementById('edit-jadwal').value = proker.jadwal || '';
      document.getElementById('edit-tempat').value = proker.tempat || '';
      document.getElementById('edit-progres-persen').value = proker.progres_persen || 0;
      document.getElementById('edit-progres-deskripsi').value = proker.progres_deskripsi || '';
      document.getElementById('edit-status-lpj').value = proker.status_lpj || 'Belum Terbit';

      modal.classList.remove('hidden');
      modal.classList.add('flex');
    }

    function closeModalEdit() {
      const modal = document.getElementById('modal-edit');
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    }
  </script>

</body>
</html>