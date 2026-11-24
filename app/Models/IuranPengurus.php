<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IuranPengurus extends Model
{
    use HasFactory;

    protected $table = 'iuran_pengurus';

    protected $fillable = [
        'nama_anggota',
        'divisi',
        'periode',
        'nominal',
        'status',
        'tanggal_bayar',
    ];

    protected $casts = [
        'nominal' => 'decimal:2',
        'tanggal_bayar' => 'date',
    ];

    public function getFormattedNominalAttribute(): string
    {
        return 'Rp ' . number_format($this->nominal, 0, ',', '.');
    }
}
