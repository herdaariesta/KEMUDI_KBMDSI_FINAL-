<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'divisi',
        'pic',
        'pagu_anggaran',
        'jadwal',
        'tempat',
        'progres_persen',
        'progres_deskripsi',
        'status_lpj',
        'deskripsi',
    ];

    protected $casts = [
        'pagu_anggaran' => 'integer',
        'progres_persen' => 'integer',
    ];

    /**
     * Get prefix acronym for badge (e.g. KL for KL-01, PS for PS-02).
     */
    public function getPrefixAttribute(): string
    {
        $parts = explode('-', $this->kode);
        return strtoupper($parts[0] ?? substr($this->divisi, 0, 2));
    }

    /**
     * Format formatted pagu anggaran (e.g. Rp 18.500.000).
     */
    public function getFormattedPaguAttribute(): string
    {
        return 'Rp ' . number_format($this->pagu_anggaran, 0, ',', '.');
    }
}
