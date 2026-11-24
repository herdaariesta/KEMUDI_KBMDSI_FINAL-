<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=1512, height=982, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>KEMUDI | Kas & Keuangan KBMDSI - Kabinet Imaginera</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;600;700&display=swap" rel="stylesheet">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
            mono: ['"JetBrains Mono"', 'monospace'],
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
              dark: '#004737',
              card: '#083329',
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
    /* Hide scrollbars for clean desktop app layout */
    ::-webkit-scrollbar {
      width: 0px;
      height: 0px;
    }
    .scrollbar-subtle::-webkit-scrollbar {
      width: 4px;
    }
    .scrollbar-subtle::-webkit-scrollbar-track {
      background: #f1f5f9;
    }
    .scrollbar-subtle::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 4px;
    }
  </style>
</head>
<body>

  <!-- Toast Notification -->
  @if(session('success'))
    <div id="toast-success" class="fixed top-5 right-5 z-50 flex items-center gap-3 px-4 py-3 bg-[#004737] text-white text-xs font-bold rounded-xl shadow-lg border border-emerald-500/30 transition-all duration-300">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
      <span>{{ session('success') }}</span>
      <button onclick="document.getElementById('toast-success').remove()" class="text-white/80 hover:text-white ml-2">✕</button>
    </div>
  @endif

  <div id="toast-copy" class="fixed top-5 right-5 z-50 hidden items-center gap-3 px-4 py-3 bg-[#004737] text-white text-xs font-bold rounded-xl shadow-lg border border-emerald-500/30 transition-all duration-300">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
    <span id="toast-copy-text">Nomor rekening Mandiri berhasil disalin!</span>
  </div>

  <!-- Root Canvas: EXACTLY 1512px x 982px -->
  <div style="width: 1512px; height: 982px;" class="flex bg-[#F8FAFC] overflow-hidden">

    <!-- ==================== SIDEBAR (260px x 982px) ==================== -->
    <aside style="width: 260px; height: 982px;" class="bg-white border-r border-slate-200/80 flex flex-col justify-between shrink-0 p-5">
      <div>
        <!-- Top Logo: KEMUDI HUB Kabinet Imaginera 2026/2027 -->
        <div class="pb-4 border-b border-slate-100 flex items-center gap-3">
          <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-[#004737] to-emerald-600 flex items-center justify-center text-white shadow-md shrink-0">
            <!-- Compass Icon with dual tone -->
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
            <div class="flex items-center gap-1.5">
              <span class="font-extrabold text-sm tracking-tight text-slate-900 leading-none">KEMUDI</span>
              <span class="text-[9px] font-extrabold px-1.5 py-0.5 rounded bg-emerald-100 text-emerald-800 leading-none">HUB</span>
            </div>
            <p class="text-[10px] font-medium text-slate-400 mt-1">Kabinet Imaginera 2026/2027</p>
          </div>
        </div>

        <!-- Navigation Menu -->
        <div class="py-4">
          <p class="px-3 text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">NAVIGASI UTAMA</p>
          <nav class="space-y-1 text-xs">
            
            <!-- Dashboard -->
            <a href="{{ route('home') }}" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-slate-600 hover:bg-slate-50 transition-colors">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-slate-400">
                <rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect>
                <rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect>
              </svg>
              <span>Dashboard</span>
            </a>

            <!-- Manajemen Proker -->
            <a href="{{ route('proker.index') }}" class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl font-semibold text-slate-600 hover:bg-slate-50 transition-colors">
              <div class="flex items-center gap-3">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-slate-400">
                  <path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path><path d="m9 16 2 2 4-4"></path>
                </svg>
                <span>Manajemen Proker</span>
              </div>
              <span class="text-[10px] bg-slate-100 text-slate-500 font-semibold px-2 py-0.5 rounded-full">12</span>
            </a>

            <!-- Active: Kas & Keuangan (Dark Forest Green Pill with Surplus Badge) -->
            <a href="{{ route('kas.index') }}" class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl font-bold bg-[#004737] text-white shadow-sm">
              <div class="flex items-center gap-3">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" class="text-white">
                  <rect width="20" height="14" x="2" y="5" rx="2"></rect><line x1="2" x2="22" y1="10" y2="10"></line>
                </svg>
                <span>Kas & Keuangan</span>
              </div>
              <span class="text-[9px] bg-emerald-500/30 text-emerald-300 border border-emerald-400/40 font-bold px-2 py-0.5 rounded-full">Surplus</span>
            </a>

            <!-- Pengajuan LPJ / LAK -->
            <a href="#" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-slate-600 hover:bg-slate-50 transition-colors">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-slate-400">
                <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><path d="m9 15 2 2 4-4"></path>
              </svg>
              <span>Pengajuan LPJ / LAK</span>
            </a>

            <!-- Halaman Profil -->
            <a href="#" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-slate-600 hover:bg-slate-50 transition-colors">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-slate-400">
                <circle cx="12" cy="8" r="5"></circle><path d="M20 21a8 8 0 1 0-16 0"></path>
              </svg>
              <span>Halaman Profil</span>
            </a>

          </nav>
        </div>
      </div>

      <!-- Bottom Profile & Status (Jason Pratama - Bendahara 1 BPH) -->
      <div>
        <div class="px-2 py-2 mb-2 flex items-center justify-between text-[10px] text-slate-400">
          <div class="flex items-center gap-1.5 font-medium">
            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            <span>Server: Normal</span>
          </div>
          <span class="border border-slate-200 px-1.5 py-0.5 rounded text-[9px] font-bold text-slate-500">FILKOM UB</span>
        </div>

        <div class="flex items-center gap-2.5 p-2 rounded-xl bg-white border border-slate-200/80 shadow-xs">
          <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=120&h=120&q=80" 
               alt="Jason" 
               class="w-8 h-8 rounded-full object-cover border border-emerald-700 ring-2 ring-emerald-50 shrink-0" />
          <div class="overflow-hidden flex-1 text-xs">
            <div class="font-bold text-slate-900 truncate text-[11px]">Jason Pratama</div>
            <div class="text-[9px] text-slate-400 truncate">Bendahara 1 BPH</div>
          </div>
        </div>
      </div>
    </aside>

    <!-- ==================== MAIN CONTENT (1252px x 982px) ==================== -->
    <div style="width: 1252px; height: 982px;" class="flex flex-col bg-[#F8FAFC]">
      
      <!-- Top Header Bar (56px) -->
      <header style="height: 56px;" class="px-7 bg-white border-b border-slate-200/80 flex items-center justify-between shrink-0">
        <form method="GET" action="{{ route('kas.index') }}" class="w-80 relative">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-slate-400 absolute left-3 top-1/2 -translate-y-1/2">
            <circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
          <input type="text" 
                 name="search" 
                 value="{{ $search }}"
                 placeholder="Cari program kerja, bukti k..." 
                 class="w-full bg-[#f8fafc] border border-slate-200 rounded-lg pl-9 pr-3 py-1.5 text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:border-emerald-600 focus:bg-white transition-all">
        </form>

        <div class="flex items-center gap-4">
          <!-- Kabinet Pill Badge -->
          <div class="flex items-center gap-2 px-3 py-1 bg-cyan-50 border border-cyan-200/80 rounded-lg text-cyan-800 text-xs font-semibold">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-cyan-600">
              <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
              <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
            </svg>
            <span>Kabinet Imaginera 2026/2027</span>
          </div>

          <!-- User Profile (Jason Pratama) -->
          <div class="flex items-center gap-2 pl-2 border-l border-slate-200">
            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=120&h=120&q=80" 
                 alt="Jason" 
                 class="w-7 h-7 rounded-full object-cover border border-emerald-600" />
            <span class="text-xs font-bold text-slate-800">Jason Pratama</span>
          </div>
        </div>
      </header>

      <!-- Scrollable Main Content Container -->
      <main class="flex-1 px-7 py-5 overflow-y-auto space-y-4">
        
        <!-- Breadcrumb & Page Header -->
        <div class="flex items-center justify-between">
          <div>
            <div class="text-[11px] font-semibold text-slate-400 flex items-center gap-1.5 mb-1">
              <span>KEMUDI FINANCIAL</span>
              <span>›</span>
              <span>Kabinet Imaginera 2026/2027</span>
              <span>›</span>
              <span class="text-[#004737] font-bold">Kas & Keuangan</span>
            </div>
            <h1 class="text-xl font-extrabold text-slate-900 tracking-tight">Kas, Iuran & Keuangan KBMDSI IMAGINERA</h1>
            <p class="text-xs text-slate-500 mt-0.5">Transparansi Keuangan Departemen Sistem Informasi Kabinet Imaginera periode kepengurusan 2026/2027.</p>
          </div>

          <!-- Action Buttons -->
          <div class="flex items-center gap-2.5">
            <a href="{{ route('proker.index') }}" 
               class="px-3.5 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-slate-700 flex items-center gap-2 shadow-xs transition-colors">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"></polyline></svg>
              <span>Ke Manajemen Proker</span>
            </a>

            <div class="px-3.5 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 flex items-center gap-2 shadow-xs">
              <span>Periode: Juni – Desember 2026</span>
            </div>

            <button onclick="openModalCreate()" 
                    class="px-4 py-2 bg-[#004737] hover:bg-[#00382b] text-white rounded-xl text-xs font-bold flex items-center gap-2 shadow-sm transition-colors">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
              <span>+ Input Transaksi</span>
            </button>
          </div>
        </div>

        <!-- 3 Financial Metric Cards (Formula: Saldo Akhir = Saldo Awal + Total Masuk - Total Keluar) -->
        <div class="grid grid-cols-3 gap-4">
          
          <!-- Card 1: TOTAL PEMASUKAN (INFLOW) -->
          <div class="bg-white border border-slate-200/80 rounded-2xl p-4 shadow-xs">
            <div class="flex items-center justify-between mb-2">
              <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">TOTAL PEMASUKAN (INFLOW)</span>
              <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-700">+18.4% MoM</span>
            </div>
            <div class="text-2xl font-black text-slate-900 tracking-tight">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</div>
            <div class="mt-3 pt-3 border-t border-slate-100 space-y-1.5 text-xs">
              <div class="flex items-center justify-between">
                <span class="text-slate-500 text-[11px]">Iuran Kas Pengurus</span>
                <span class="font-bold text-slate-800 text-[11px]">Rp {{ number_format($inflowIuran, 0, ',', '.') }}</span>
              </div>
              <div class="flex items-center justify-between">
                <span class="text-slate-500 text-[11px]">Sponsorship & Danus</span>
                <span class="font-bold text-slate-800 text-[11px]">Rp {{ number_format($inflowDanus, 0, ',', '.') }}</span>
              </div>
            </div>
          </div>

          <!-- Card 2: TOTAL PENGELUARAN (OUTFLOW) -->
          <div class="bg-white border border-slate-200/80 rounded-2xl p-4 shadow-xs">
            <div class="flex items-center justify-between mb-2">
              <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">TOTAL PENGELUARAN (OUTFLOW)</span>
              <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-rose-100 text-rose-700">29.1% dari pagu</span>
            </div>
            <div class="text-2xl font-black text-slate-900 tracking-tight">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</div>
            <div class="mt-3 pt-3 border-t border-slate-100 space-y-1.5 text-xs">
              <div class="flex items-center justify-between">
                <span class="text-slate-500 text-[11px]">Operasional & ATK</span>
                <span class="font-bold text-slate-800 text-[11px]">Rp {{ number_format($outflowAtk, 0, ',', '.') }}</span>
              </div>
              <div class="flex items-center justify-between">
                <span class="text-slate-500 text-[11px]">Konsumsi Rapat Pleno</span>
                <span class="font-bold text-slate-800 text-[11px]">Rp {{ number_format($outflowPleno, 0, ',', '.') }}</span>
              </div>
            </div>
          </div>

          <!-- Card 3: SALDO KAS RIIL ORGANISASI -->
          <div class="bg-white border border-slate-200/80 rounded-2xl p-4 shadow-xs">
            <div class="flex items-center justify-between mb-2">
              <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">SALDO KAS RIIL ORGANISASI</span>
              <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#004737] text-white">Surplus Sehat</span>
            </div>
            <div class="text-2xl font-black text-[#004737] tracking-tight">Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</div>
            <div class="mt-3 pt-3 border-t border-slate-100">
              <div class="flex items-center justify-between text-[11px] mb-1.5">
                <span class="text-slate-500">Giro Mandiri (KBMDSI)</span>
                <span class="font-bold text-emerald-700">Rasio 70.8% Aman</span>
              </div>
              <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                <div class="h-full bg-emerald-600 rounded-full" style="width: 70.8%;"></div>
              </div>
            </div>
          </div>

        </div>

        <!-- 2-Column Main Workspace -->
        <div class="grid grid-cols-12 gap-4">
          
          <!-- LEFT COLUMN (Span 8): Buku Mutasi + Komparasi Arus Kas Mingguan -->
          <div class="col-span-8 space-y-4">
            
            <!-- Card 1: Buku Mutasi Kas Terkini -->
            <div class="bg-white border border-slate-200/80 rounded-2xl p-4 shadow-xs">
              <div class="flex items-center justify-between mb-3">
                <div>
                  <h2 class="text-sm font-extrabold text-slate-900">Buku Mutasi Kas Terkini</h2>
                  <p class="text-[11px] text-slate-400">Daftar arus kas masuk & keluar KBMDSI</p>
                </div>

                <!-- Tabs: Semua, Masuk, Keluar -->
                <div class="flex items-center bg-slate-100/90 p-1 rounded-xl text-xs font-bold">
                  <a href="{{ route('kas.index', ['jenis' => 'semua', 'search' => $search]) }}" 
                     class="px-3 py-1 rounded-lg transition-all {{ $jenisFilter === 'semua' ? 'bg-[#004737] text-white shadow-xs' : 'text-slate-600 hover:text-slate-900' }}">
                    Semua ({{ $countSemua }})
                  </a>
                  <a href="{{ route('kas.index', ['jenis' => 'masuk', 'search' => $search]) }}" 
                     class="px-3 py-1 rounded-lg transition-all {{ $jenisFilter === 'masuk' ? 'bg-[#004737] text-white shadow-xs' : 'text-slate-600 hover:text-slate-900' }}">
                    Masuk (+{{ $countMasuk }})
                  </a>
                  <a href="{{ route('kas.index', ['jenis' => 'keluar', 'search' => $search]) }}" 
                     class="px-3 py-1 rounded-lg transition-all {{ $jenisFilter === 'keluar' ? 'bg-[#004737] text-white shadow-xs' : 'text-slate-600 hover:text-slate-900' }}">
                    Keluar (-{{ $countKeluar }})
                  </a>
                </div>
              </div>

              <!-- Table Mutasi Kas -->
              <div class="overflow-hidden border border-slate-100 rounded-xl">
                <table class="w-full text-left text-xs">
                  <thead class="bg-slate-50/70 border-b border-slate-100 text-[10px] font-bold text-slate-400 uppercase tracking-wider">
                    <tr>
                      <th class="py-2.5 px-3.5">TANGGAL</th>
                      <th class="py-2.5 px-3.5">DESKRIPSI & PIHAK TERKAIT</th>
                      <th class="py-2.5 px-3.5">JENIS</th>
                      <th class="py-2.5 px-3.5 text-right">NOMINAL</th>
                      <th class="py-2.5 px-3 text-center">AKSI</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-slate-100">
                    @forelse($transaksiList as $item)
                      <tr class="hover:bg-slate-50/70 transition-colors group">
                        
                        <!-- Tanggal -->
                        <td class="py-3 px-3.5 text-slate-500 font-medium text-[11px] whitespace-nowrap align-middle">
                          {{ $item->formatted_tanggal }}
                        </td>

                        <!-- Deskripsi & Pihak Terkait -->
                        <td class="py-3 px-3.5 align-middle">
                          <div class="font-bold text-slate-800 text-xs">{{ $item->deskripsi }}</div>
                          <div class="text-[11px] text-slate-400 flex items-center gap-1.5 mt-0.5">
                            <span>{{ $item->pihak_terkait }}</span>
                            @if($item->programKerja)
                              <span class="text-emerald-700 bg-emerald-50 px-1.5 py-0.2 rounded text-[9px] font-bold">
                                {{ $item->programKerja->kode }}
                              </span>
                            @endif
                          </div>
                        </td>

                        <!-- Jenis Badge -->
                        <td class="py-3 px-3.5 align-middle whitespace-nowrap">
                          @if($item->jenis === 'masuk')
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-100/80 text-emerald-700">
                              Masuk
                            </span>
                          @else
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-rose-100/80 text-rose-700">
                              Keluar
                            </span>
                          @endif
                        </td>

                        <!-- Nominal -->
                        <td class="py-3 px-3.5 text-right font-bold text-xs align-middle whitespace-nowrap">
                          @if($item->jenis === 'masuk')
                            <span class="text-emerald-700">+ Rp {{ number_format($item->nominal, 0, ',', '.') }}</span>
                          @else
                            <span class="text-rose-600">- Rp {{ number_format($item->nominal, 0, ',', '.') }}</span>
                          @endif
                        </td>

                        <!-- Action Buttons -->
                        <td class="py-3 px-3 text-center align-middle whitespace-nowrap">
                          <div class="flex items-center justify-center gap-1.5 opacity-80 group-hover:opacity-100 transition-opacity">
                            <button onclick="openModalEdit({{ $item->id }}, '{{ addslashes($item->deskripsi) }}', '{{ addslashes($item->pihak_terkait) }}', '{{ $item->jenis }}', '{{ $item->kategori }}', {{ $item->nominal }}, '{{ $item->tanggal->format('Y-m-d') }}', '{{ $item->program_kerja_id }}')"
                                    title="Edit Transaksi"
                                    class="p-1 rounded text-slate-400 hover:text-emerald-700 hover:bg-emerald-50 transition-colors">
                              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </button>
                            <form method="POST" action="{{ route('kas.destroy', $item->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini? Saldo kas akan dihitung ulang secara otomatis.')" class="inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" 
                                      title="Hapus Transaksi"
                                      class="p-1 rounded text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                              </button>
                            </form>
                          </div>
                        </td>

                      </tr>
                    @empty
                      <tr>
                        <td colspan="5" class="py-6 text-center text-slate-400 text-xs">
                          Belum ada transaksi kas yang dicatat untuk filter ini.
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>

              <!-- Pagination Info if more -->
              @if($transaksiList->hasPages())
                <div class="mt-3 flex items-center justify-between text-xs text-slate-500 pt-2 border-t border-slate-100">
                  <div>Menampilkan {{ $transaksiList->count() }} dari {{ $transaksiList->total() }} mutasi</div>
                  <div>{{ $transaksiList->links() }}</div>
                </div>
              @endif
            </div>

            <!-- Card 2: Komparasi Arus Kas Mingguan (Mei 2026) -->
            <div class="bg-white border border-slate-200/80 rounded-2xl p-4 shadow-xs">
              <div class="flex items-center justify-between mb-3">
                <div>
                  <h3 class="text-sm font-extrabold text-slate-900">Komparasi Arus Kas Mingguan (Mei 2026)</h3>
                  <p class="text-[11px] text-slate-400">Inflow vs Outflow per 7 hari kalender</p>
                </div>
                
                <!-- Legend -->
                <div class="flex items-center gap-4 text-xs font-semibold">
                  <div class="flex items-center gap-1.5">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-600"></span>
                    <span class="text-slate-600 text-[11px]">Inflow</span>
                  </div>
                  <div class="flex items-center gap-1.5">
                    <span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span>
                    <span class="text-slate-600 text-[11px]">Outflow</span>
                  </div>
                </div>
              </div>

              <!-- Bar Chart Visualization -->
              <div class="h-32 flex items-end justify-between px-6 pt-4 pb-2 border-t border-slate-100">
                
                <!-- Minggu 1 -->
                <div class="flex flex-col items-center gap-2 group relative">
                  <!-- Tooltip -->
                  <div class="absolute -top-10 hidden group-hover:flex flex-col items-center bg-slate-900 text-white text-[10px] py-1 px-2 rounded shadow-lg z-20 whitespace-nowrap pointer-events-none">
                    <span>Inflow: {{ $mingguan[1]['inflow_formatted'] }}</span>
                    <span>Outflow: {{ $mingguan[1]['outflow_formatted'] }}</span>
                  </div>
                  <div class="flex items-end gap-1.5 h-24">
                    <div class="w-5 bg-emerald-600 rounded-t transition-all hover:opacity-90" style="height: {{ max(10, min(100, ($mingguan[1]['inflow'] / 2500000) * 100)) }}%;"></div>
                    <div class="w-5 bg-rose-500 rounded-t transition-all hover:opacity-90" style="height: {{ max(10, min(100, ($mingguan[1]['outflow'] / 2500000) * 100)) }}%;"></div>
                  </div>
                  <span class="text-[11px] font-semibold text-slate-500">Minggu 1</span>
                </div>

                <!-- Minggu 2 -->
                <div class="flex flex-col items-center gap-2 group relative">
                  <!-- Tooltip -->
                  <div class="absolute -top-10 hidden group-hover:flex flex-col items-center bg-slate-900 text-white text-[10px] py-1 px-2 rounded shadow-lg z-20 whitespace-nowrap pointer-events-none">
                    <span>Inflow: {{ $mingguan[2]['inflow_formatted'] }}</span>
                    <span>Outflow: {{ $mingguan[2]['outflow_formatted'] }}</span>
                  </div>
                  <div class="flex items-end gap-1.5 h-24">
                    <div class="w-5 bg-emerald-600 rounded-t transition-all hover:opacity-90" style="height: {{ max(10, min(100, ($mingguan[2]['inflow'] / 2500000) * 100)) }}%;"></div>
                    <div class="w-5 bg-rose-500 rounded-t transition-all hover:opacity-90" style="height: {{ max(10, min(100, ($mingguan[2]['outflow'] / 2500000) * 100)) }}%;"></div>
                  </div>
                  <span class="text-[11px] font-semibold text-slate-500">Minggu 2</span>
                </div>

                <!-- Minggu 3 -->
                <div class="flex flex-col items-center gap-2 group relative">
                  <!-- Tooltip -->
                  <div class="absolute -top-10 hidden group-hover:flex flex-col items-center bg-slate-900 text-white text-[10px] py-1 px-2 rounded shadow-lg z-20 whitespace-nowrap pointer-events-none">
                    <span>Inflow: {{ $mingguan[3]['inflow_formatted'] }}</span>
                    <span>Outflow: {{ $mingguan[3]['outflow_formatted'] }}</span>
                  </div>
                  <div class="flex items-end gap-1.5 h-24">
                    <div class="w-5 bg-emerald-600 rounded-t transition-all hover:opacity-90" style="height: {{ max(10, min(100, ($mingguan[3]['inflow'] / 2500000) * 100)) }}%;"></div>
                    <div class="w-5 bg-rose-500 rounded-t transition-all hover:opacity-90" style="height: {{ max(10, min(100, ($mingguan[3]['outflow'] / 2500000) * 100)) }}%;"></div>
                  </div>
                  <span class="text-[11px] font-semibold text-slate-500">Minggu 3</span>
                </div>

                <!-- Minggu 4 -->
                <div class="flex flex-col items-center gap-2 group relative">
                  <!-- Tooltip -->
                  <div class="absolute -top-10 hidden group-hover:flex flex-col items-center bg-slate-900 text-white text-[10px] py-1 px-2 rounded shadow-lg z-20 whitespace-nowrap pointer-events-none">
                    <span>Inflow: {{ $mingguan[4]['inflow_formatted'] }}</span>
                    <span>Outflow: {{ $mingguan[4]['outflow_formatted'] }}</span>
                  </div>
                  <div class="flex items-end gap-1.5 h-24">
                    <div class="w-5 bg-emerald-600 rounded-t transition-all hover:opacity-90" style="height: {{ max(10, min(100, ($mingguan[4]['inflow'] / 2500000) * 100)) }}%;"></div>
                    <div class="w-5 bg-rose-500 rounded-t transition-all hover:opacity-90" style="height: {{ max(10, min(100, ($mingguan[4]['outflow'] / 2500000) * 100)) }}%;"></div>
                  </div>
                  <span class="text-[11px] font-semibold text-slate-500">Minggu 4</span>
                </div>

              </div>
            </div>

          </div>

          <!-- RIGHT COLUMN (Span 4): Iuran Pengurus + Mandiri Card + QRIS -->
          <div class="col-span-4 space-y-4">
            
            <!-- Widget 1: Iuran Pengurus -->
            <div class="bg-white border border-slate-200/80 rounded-2xl p-4 shadow-xs">
              <div class="flex items-center justify-between mb-1">
                <h3 class="text-sm font-extrabold text-slate-900">Iuran Pengurus</h3>
                <span class="text-[10px] font-extrabold px-2 py-0.5 rounded bg-blue-50 text-blue-700">MEI 2026</span>
              </div>
              <p class="text-[11px] text-slate-400 mb-3">Target: Rp 60.000 / pengurus</p>

              <!-- Progress Metric -->
              <div class="flex items-center justify-between text-xs font-bold mb-1">
                <span class="text-slate-800">{{ $lunasPengurus }} / {{ $totalPengurus }} Pengurus</span>
                <span class="text-emerald-700">{{ $persenIuran }}%</span>
              </div>
              <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden mb-2">
                <div class="h-full bg-emerald-600 rounded-full" style="width: {{ $persenIuran }}%;"></div>
              </div>
              <div class="flex items-center justify-between text-[11px] font-medium text-slate-500 pb-3 border-b border-slate-100">
                <span>Terkumpul: <strong class="text-slate-800">Rp {{ number_format($terkumpulIuran / 1000000, 2) }}M</strong></span>
                <span>Sisa: <strong class="text-rose-600">Rp {{ number_format($sisaIuran / 1000) }}K</strong></span>
              </div>

              <!-- Pinned Member Rows (Rani, Fakhri, Bagas) -->
              <div class="mt-3 space-y-2">
                @foreach($pinnedPengurus as $pengurus)
                  <div class="flex items-center justify-between text-xs py-1">
                    <span class="font-semibold text-slate-800">{{ $pengurus->nama_anggota }}</span>
                    @if($pengurus->status === 'lunas')
                      <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full flex items-center gap-1">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Lunas
                      </span>
                    @else
                      <span class="text-[10px] font-bold text-rose-600 bg-rose-50 px-2.5 py-0.5 rounded-full">
                        Belum
                      </span>
                    @endif
                  </div>
                @endforeach
              </div>

              <!-- Button to view/manage all 50 members -->
              <button onclick="openModalIuran()" 
                      class="w-full mt-3 py-1.5 bg-slate-50 hover:bg-slate-100 text-slate-600 text-[11px] font-bold rounded-lg border border-slate-200 transition-colors">
                Kelola Semua 50 Anggota
              </button>
            </div>

            <!-- Widget 2: Bank Mandiri Giro Card (Dark Emerald Gradient) -->
            <div class="bg-gradient-to-br from-[#004737] via-[#053d30] to-[#01221b] text-white rounded-2xl p-4 shadow-sm relative overflow-hidden">
              <div class="flex items-center justify-between mb-1">
                <span class="text-xs font-extrabold tracking-wide">BANK MANDIRI (GIRO)</span>
                <span class="text-[9px] font-extrabold px-1.5 py-0.5 rounded bg-white/10 text-emerald-200">ATM</span>
              </div>
              <p class="text-[10px] text-emerald-200/80 mb-3">KBMDSI FILKOM UB</p>

              <div class="flex items-center justify-between pt-1">
                <div class="font-mono text-base font-bold tracking-wider" id="no-rek">
                  144-00-2983741-2
                </div>
                <button onclick="copyRekening()" 
                        class="px-2.5 py-1 bg-emerald-600/60 hover:bg-emerald-600 text-[10px] font-bold rounded-md border border-emerald-400/30 transition-all flex items-center gap-1">
                  <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path></svg>
                  <span>Salin</span>
                </button>
              </div>
            </div>

            <!-- Widget 3: QRIS KBMDSI -->
            <div class="bg-white border border-slate-200/80 rounded-2xl p-4 shadow-xs flex items-center justify-between">
              <div>
                <h4 class="text-xs font-extrabold text-slate-900">QRIS KBMDSI</h4>
                <p class="text-[10px] text-slate-400 mt-0.5">BCA, GoPay, OVO, Mandiri</p>
                <div class="flex items-center gap-1.5 mt-3">
                  <span class="text-[9px] bg-slate-100 text-slate-600 font-semibold px-1.5 py-0.5 rounded">NMID: ID102026</span>
                </div>
              </div>
              
              <!-- Clean SVG QR Code -->
              <div class="w-16 h-16 bg-slate-50 border border-slate-200 p-1 rounded-xl flex items-center justify-center shrink-0">
                <svg width="56" height="56" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <!-- QR Matrix Graphic -->
                  <rect width="100" height="100" fill="white" rx="4"/>
                  <!-- Position Markers Top-Left -->
                  <rect x="8" y="8" width="28" height="28" rx="3" stroke="#0f172a" stroke-width="6"/>
                  <rect x="16" y="16" width="12" height="12" fill="#0f172a"/>
                  <!-- Position Markers Top-Right -->
                  <rect x="64" y="8" width="28" height="28" rx="3" stroke="#0f172a" stroke-width="6"/>
                  <rect x="72" y="16" width="12" height="12" fill="#0f172a"/>
                  <!-- Position Markers Bottom-Left -->
                  <rect x="8" y="64" width="28" height="28" rx="3" stroke="#0f172a" stroke-width="6"/>
                  <rect x="16" y="72" width="12" height="12" fill="#0f172a"/>
                  <!-- QR Pattern modules -->
                  <rect x="42" y="12" width="6" height="6" fill="#0f172a"/>
                  <rect x="52" y="12" width="6" height="12" fill="#0f172a"/>
                  <rect x="42" y="24" width="16" height="6" fill="#0f172a"/>
                  <rect x="12" y="42" width="6" height="16" fill="#0f172a"/>
                  <rect x="24" y="48" width="12" height="6" fill="#0f172a"/>
                  <rect x="42" y="42" width="16" height="16" rx="2" fill="#004737"/>
                  <rect x="64" y="44" width="8" height="8" fill="#0f172a"/>
                  <rect x="80" y="44" width="8" height="18" fill="#0f172a"/>
                  <rect x="44" y="66" width="12" height="8" fill="#0f172a"/>
                  <rect x="60" y="70" width="18" height="6" fill="#0f172a"/>
                  <rect x="74" y="80" width="16" height="8" fill="#0f172a"/>
                  <rect x="44" y="82" width="8" height="8" fill="#0f172a"/>
                  <!-- KBMDSI Mini center tag -->
                  <circle cx="50" cy="50" r="5" fill="#bef264"/>
                </svg>
              </div>
            </div>

          </div>

        </div>

      </main>

    </div>

  </div>

  <!-- ==================== MODAL 1: INPUT TRANSAKSI BARU ==================== -->
  <div id="modal-create" class="fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-xs hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-2xl w-full max-w-lg overflow-hidden animate-in fade-in zoom-in-95 duration-200">
      
      <!-- Header -->
      <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
        <div>
          <h3 class="text-sm font-extrabold text-slate-900">+ Input Transaksi Kas Baru</h3>
          <p class="text-[11px] text-slate-400">Pencatatan kas masuk atau kas keluar KBMDSI</p>
        </div>
        <button onclick="closeModalCreate()" class="text-slate-400 hover:text-slate-600 text-sm font-bold">✕</button>
      </div>

      <!-- Form -->
      <form method="POST" action="{{ route('kas.store') }}" class="p-6 space-y-4 text-xs">
        @csrf
        
        <!-- Jenis Transaksi (Masuk / Keluar) -->
        <div>
          <label class="block font-bold text-slate-700 mb-1.5">Jenis Transaksi <span class="text-rose-500">*</span></label>
          <div class="grid grid-cols-2 gap-3">
            <label class="flex items-center gap-2 p-2.5 border rounded-xl cursor-pointer hover:bg-slate-50 transition-colors border-slate-200 has-[:checked]:border-emerald-600 has-[:checked]:bg-emerald-50/40">
              <input type="radio" name="jenis" value="masuk" checked class="text-emerald-600 focus:ring-emerald-500" />
              <div class="font-bold text-slate-800">Pemasukan (Inflow)</div>
            </label>
            <label class="flex items-center gap-2 p-2.5 border rounded-xl cursor-pointer hover:bg-slate-50 transition-colors border-slate-200 has-[:checked]:border-rose-500 has-[:checked]:bg-rose-50/40">
              <input type="radio" name="jenis" value="keluar" class="text-rose-600 focus:ring-rose-500" />
              <div class="font-bold text-slate-800">Pengeluaran (Outflow)</div>
            </label>
          </div>
        </div>

        <!-- Tanggal Transaksi -->
        <div>
          <label class="block font-bold text-slate-700 mb-1">Tanggal Transaksi <span class="text-rose-500">*</span></label>
          <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" required
                 class="w-full bg-[#f8fafc] border border-slate-200 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-emerald-600">
        </div>

        <!-- Deskripsi Transaksi -->
        <div>
          <label class="block font-bold text-slate-700 mb-1">Deskripsi Transaksi <span class="text-rose-500">*</span></label>
          <input type="text" name="deskripsi" placeholder="Contoh: Dana Sponsorship Bank Mandiri" required
                 class="w-full bg-[#f8fafc] border border-slate-200 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-emerald-600">
        </div>

        <!-- Pihak Terkait / Keterangan Sumber -->
        <div>
          <label class="block font-bold text-slate-700 mb-1">Pihak Terkait / Sumber / Vendor <span class="text-rose-500">*</span></label>
          <input type="text" name="pihak_terkait" placeholder="Contoh: Termin 1 Tech Expo KBMDSI" required
                 class="w-full bg-[#f8fafc] border border-slate-200 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-emerald-600">
        </div>

        <div class="grid grid-cols-2 gap-3">
          <!-- Kategori -->
          <div>
            <label class="block font-bold text-slate-700 mb-1">Kategori Transaksi <span class="text-rose-500">*</span></label>
            <select name="kategori" required
                    class="w-full bg-[#f8fafc] border border-slate-200 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-emerald-600">
              <option value="Sponsorship & Danus">Sponsorship & Danus</option>
              <option value="Iuran Kas Pengurus">Iuran Kas Pengurus</option>
              <option value="Operasional & ATK">Operasional & ATK</option>
              <option value="Konsumsi Rapat Pleno">Konsumsi Rapat Pleno</option>
              <option value="Operasional Kegiatan">Operasional Kegiatan</option>
              <option value="Lainnya">Lainnya</option>
            </select>
          </div>

          <!-- Relasi Program Kerja (Opsional) -->
          <div>
            <label class="block font-bold text-slate-700 mb-1">Relasi Proker (Opsional)</label>
            <select name="program_kerja_id"
                    class="w-full bg-[#f8fafc] border border-slate-200 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-emerald-600">
              <option value="">-- Tidak Terkait Proker --</option>
              @foreach($programKerjas as $proker)
                <option value="{{ $proker->id }}">[{{ $proker->kode }}] {{ $proker->nama }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <!-- Nominal -->
        <div>
          <label class="block font-bold text-slate-700 mb-1">Nominal (Rupiah) <span class="text-rose-500">*</span></label>
          <div class="relative">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 font-bold text-slate-400">Rp</span>
            <input type="number" name="nominal" min="1" step="1000" placeholder="2500000" required
                   class="w-full bg-[#f8fafc] border border-slate-200 rounded-lg pl-9 pr-3 py-2 text-xs text-slate-800 font-bold focus:outline-none focus:border-emerald-600">
          </div>
        </div>

        <!-- Buttons -->
        <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2.5">
          <button type="button" onclick="closeModalCreate()"
                  class="px-4 py-2 border border-slate-200 rounded-xl font-bold text-slate-600 hover:bg-slate-50 transition-colors">
            Batal
          </button>
          <button type="submit"
                  class="px-5 py-2 bg-[#004737] hover:bg-[#00382b] text-white rounded-xl font-bold shadow-xs transition-colors">
            Simpan Transaksi
          </button>
        </div>
      </form>

    </div>
  </div>

  <!-- ==================== MODAL 2: EDIT TRANSAKSI ==================== -->
  <div id="modal-edit" class="fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-xs hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-2xl w-full max-w-lg overflow-hidden animate-in fade-in zoom-in-95 duration-200">
      
      <!-- Header -->
      <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
        <div>
          <h3 class="text-sm font-extrabold text-slate-900">Edit Data Transaksi Kas</h3>
          <p class="text-[11px] text-slate-400">Perbarui rincian transaksi kas KBMDSI</p>
        </div>
        <button onclick="closeModalEdit()" class="text-slate-400 hover:text-slate-600 text-sm font-bold">✕</button>
      </div>

      <!-- Form -->
      <form id="form-edit" method="POST" action="" class="p-6 space-y-4 text-xs">
        @csrf
        @method('PUT')
        
        <!-- Jenis Transaksi (Masuk / Keluar) -->
        <div>
          <label class="block font-bold text-slate-700 mb-1.5">Jenis Transaksi <span class="text-rose-500">*</span></label>
          <div class="grid grid-cols-2 gap-3">
            <label class="flex items-center gap-2 p-2.5 border rounded-xl cursor-pointer hover:bg-slate-50 transition-colors border-slate-200">
              <input type="radio" id="edit-jenis-masuk" name="jenis" value="masuk" class="text-emerald-600 focus:ring-emerald-500" />
              <div class="font-bold text-slate-800">Pemasukan (Inflow)</div>
            </label>
            <label class="flex items-center gap-2 p-2.5 border rounded-xl cursor-pointer hover:bg-slate-50 transition-colors border-slate-200">
              <input type="radio" id="edit-jenis-keluar" name="jenis" value="keluar" class="text-rose-600 focus:ring-rose-500" />
              <div class="font-bold text-slate-800">Pengeluaran (Outflow)</div>
            </label>
          </div>
        </div>

        <!-- Tanggal Transaksi -->
        <div>
          <label class="block font-bold text-slate-700 mb-1">Tanggal Transaksi <span class="text-rose-500">*</span></label>
          <input type="date" id="edit-tanggal" name="tanggal" required
                 class="w-full bg-[#f8fafc] border border-slate-200 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-emerald-600">
        </div>

        <!-- Deskripsi Transaksi -->
        <div>
          <label class="block font-bold text-slate-700 mb-1">Deskripsi Transaksi <span class="text-rose-500">*</span></label>
          <input type="text" id="edit-deskripsi" name="deskripsi" required
                 class="w-full bg-[#f8fafc] border border-slate-200 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-emerald-600">
        </div>

        <!-- Pihak Terkait -->
        <div>
          <label class="block font-bold text-slate-700 mb-1">Pihak Terkait / Sumber / Vendor <span class="text-rose-500">*</span></label>
          <input type="text" id="edit-pihak" name="pihak_terkait" required
                 class="w-full bg-[#f8fafc] border border-slate-200 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-emerald-600">
        </div>

        <div class="grid grid-cols-2 gap-3">
          <!-- Kategori -->
          <div>
            <label class="block font-bold text-slate-700 mb-1">Kategori Transaksi <span class="text-rose-500">*</span></label>
            <select id="edit-kategori" name="kategori" required
                    class="w-full bg-[#f8fafc] border border-slate-200 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-emerald-600">
              <option value="Sponsorship & Danus">Sponsorship & Danus</option>
              <option value="Iuran Kas Pengurus">Iuran Kas Pengurus</option>
              <option value="Operasional & ATK">Operasional & ATK</option>
              <option value="Konsumsi Rapat Pleno">Konsumsi Rapat Pleno</option>
              <option value="Operasional Kegiatan">Operasional Kegiatan</option>
              <option value="Lainnya">Lainnya</option>
            </select>
          </div>

          <!-- Relasi Program Kerja -->
          <div>
            <label class="block font-bold text-slate-700 mb-1">Relasi Proker</label>
            <select id="edit-proker" name="program_kerja_id"
                    class="w-full bg-[#f8fafc] border border-slate-200 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-emerald-600">
              <option value="">-- Tidak Terkait Proker --</option>
              @foreach($programKerjas as $proker)
                <option value="{{ $proker->id }}">[{{ $proker->kode }}] {{ $proker->nama }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <!-- Nominal -->
        <div>
          <label class="block font-bold text-slate-700 mb-1">Nominal (Rupiah) <span class="text-rose-500">*</span></label>
          <div class="relative">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 font-bold text-slate-400">Rp</span>
            <input type="number" id="edit-nominal" name="nominal" min="1" step="1000" required
                   class="w-full bg-[#f8fafc] border border-slate-200 rounded-lg pl-9 pr-3 py-2 text-xs text-slate-800 font-bold focus:outline-none focus:border-emerald-600">
          </div>
        </div>

        <!-- Buttons -->
        <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2.5">
          <button type="button" onclick="closeModalEdit()"
                  class="px-4 py-2 border border-slate-200 rounded-xl font-bold text-slate-600 hover:bg-slate-50 transition-colors">
            Batal
          </button>
          <button type="submit"
                  class="px-5 py-2 bg-[#004737] hover:bg-[#00382b] text-white rounded-xl font-bold shadow-xs transition-colors">
            Perbarui Transaksi
          </button>
        </div>
      </form>

    </div>
  </div>

  <!-- ==================== MODAL 3: KELOLA SEMUA 50 IURAN PENGURUS ==================== -->
  <div id="modal-iuran" class="fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-xs hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-2xl w-full max-w-2xl overflow-hidden animate-in fade-in zoom-in-95 duration-200 flex flex-col max-h-[85vh]">
      
      <!-- Header -->
      <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-slate-50/50 shrink-0">
        <div>
          <h3 class="text-sm font-extrabold text-slate-900">Daftar Iuran 50 Pengurus KBMDSI (Mei 2026)</h3>
          <p class="text-[11px] text-slate-400">Target Rp 60.000 / pengurus — Klik status untuk mengubah status bayar</p>
        </div>
        <button onclick="closeModalIuran()" class="text-slate-400 hover:text-slate-600 text-sm font-bold">✕</button>
      </div>

      <!-- Search member input -->
      <div class="p-4 border-b border-slate-100 shrink-0">
        <input type="text" id="search-iuran-input" onkeyup="filterIuranTable()" placeholder="Ketik nama pengurus atau divisi..." 
               class="w-full bg-[#f8fafc] border border-slate-200 rounded-lg px-3 py-2 text-xs text-slate-700 focus:outline-none focus:border-emerald-600">
      </div>

      <!-- Members list container -->
      <div class="overflow-y-auto p-4 flex-1 scrollbar-subtle">
        <table class="w-full text-left text-xs" id="table-iuran">
          <thead class="bg-slate-50 text-[10px] font-bold text-slate-400 uppercase">
            <tr>
              <th class="py-2 px-3">NO</th>
              <th class="py-2 px-3">NAMA PENGURUS</th>
              <th class="py-2 px-3">DIVISI</th>
              <th class="py-2 px-3">NOMINAL</th>
              <th class="py-2 px-3 text-center">STATUS</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            @foreach($allPengurus as $idx => $item)
              <tr class="hover:bg-slate-50/80 transition-colors iuran-row">
                <td class="py-2.5 px-3 text-slate-400 font-mono text-[11px]">{{ $idx + 1 }}</td>
                <td class="py-2.5 px-3 font-bold text-slate-800 iuran-name">{{ $item->nama_anggota }}</td>
                <td class="py-2.5 px-3 text-slate-500 text-[11px] iuran-divisi">{{ $item->divisi }}</td>
                <td class="py-2.5 px-3 font-semibold text-slate-700 text-[11px]">{{ $item->formatted_nominal }}</td>
                <td class="py-2.5 px-3 text-center">
                  <form method="POST" action="{{ route('iuran.update', $item->id) }}" class="inline">
                    @csrf
                    @method('PATCH')
                    @if($item->status === 'lunas')
                      <button type="submit" 
                              title="Klik untuk ubah menjadi Belum"
                              class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800 hover:bg-emerald-200 transition-colors">
                        ✓ Lunas
                      </button>
                    @else
                      <button type="submit" 
                              title="Klik untuk ubah menjadi Lunas"
                              class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-rose-100 text-rose-700 hover:bg-rose-200 transition-colors">
                        Belum
                      </button>
                    @endif
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Footer -->
      <div class="px-6 py-3 border-t border-slate-100 bg-slate-50/50 flex items-center justify-between text-xs text-slate-500 shrink-0">
        <div>{{ $lunasPengurus }} dari {{ $totalPengurus }} pengurus sudah lunas ({{ $persenIuran }}%)</div>
        <button onclick="closeModalIuran()" class="px-4 py-1.5 bg-[#004737] text-white font-bold rounded-lg hover:bg-[#00382b] transition-colors">
          Tutup
        </button>
      </div>

    </div>
  </div>

  <!-- JavaScript Interactivity -->
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

    function openModalEdit(id, deskripsi, pihak, jenis, kategori, nominal, tanggal, prokerId) {
      const modal = document.getElementById('modal-edit');
      const form = document.getElementById('form-edit');
      
      form.action = `/kas/${id}`;
      document.getElementById('edit-deskripsi').value = deskripsi;
      document.getElementById('edit-pihak').value = pihak;
      document.getElementById('edit-nominal').value = nominal;
      document.getElementById('edit-tanggal').value = tanggal;
      document.getElementById('edit-kategori').value = kategori;
      document.getElementById('edit-proker').value = prokerId || '';

      if (jenis === 'masuk') {
        document.getElementById('edit-jenis-masuk').checked = true;
      } else {
        document.getElementById('edit-jenis-keluar').checked = true;
      }

      modal.classList.remove('hidden');
      modal.classList.add('flex');
    }

    function closeModalEdit() {
      const modal = document.getElementById('modal-edit');
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    }

    function openModalIuran() {
      const modal = document.getElementById('modal-iuran');
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    }

    function closeModalIuran() {
      const modal = document.getElementById('modal-iuran');
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    }

    function filterIuranTable() {
      const input = document.getElementById('search-iuran-input').value.toLowerCase();
      const rows = document.querySelectorAll('.iuran-row');
      rows.forEach(row => {
        const name = row.querySelector('.iuran-name').textContent.toLowerCase();
        const divisi = row.querySelector('.iuran-divisi').textContent.toLowerCase();
        if (name.includes(input) || divisi.includes(input)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    }

    function copyRekening() {
      const text = document.getElementById('no-rek').innerText.trim();
      navigator.clipboard.writeText(text).then(() => {
        const toast = document.getElementById('toast-copy');
        toast.classList.remove('hidden');
        toast.classList.add('flex');
        setTimeout(() => {
          toast.classList.add('hidden');
          toast.classList.remove('flex');
        }, 2500);
      });
    }

    // Close modals on Escape key
    document.addEventListener('keydown', function(event) {
      if (event.key === 'Escape') {
        closeModalCreate();
        closeModalEdit();
        closeModalIuran();
      }
    });
  </script>

</body>
</html>
