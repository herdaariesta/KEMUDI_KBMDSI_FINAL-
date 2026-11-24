<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransaksiKas extends Model
{
    use HasFactory;

    protected $table = 'transaksi_kas';

    protected $fillable = [
        'program_kerja_id',
        'tanggal',
        'deskripsi',
        'pihak_terkait',
        'jenis',
        'kategori',
        'nominal',
        'minggu_ke',
        'bukti_transaksi',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'nominal' => 'decimal:2',
        'minggu_ke' => 'integer',
    ];

    public function programKerja(): BelongsTo
    {
        return $this->belongsTo(ProgramKerja::class, 'program_kerja_id');
    }

    public function getFormattedNominalAttribute(): string
    {
        return 'Rp ' . number_format($this->nominal, 0, ',', '.');
    }

    public function getFormattedTanggalAttribute(): string
    {
        $bulanIndo = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        $day = $this->tanggal->format('d');
        $month = $bulanIndo[(int)$this->tanggal->format('m')] ?? $this->tanggal->format('M');
        $year = $this->tanggal->format('Y');

        return "{$day} {$month} {$year}";
    }
}
