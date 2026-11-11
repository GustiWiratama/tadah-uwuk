<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'user_id',
        'nama_pengunjung',
        'kode_tiket',
        'tanggal_kunjungan',
        'jumlah_pengunjung',
        'total_harga',
        'status_pembayaran',
        'status_kunjungan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_kunjungan' => 'date',
            'total_harga' => 'decimal:2',
        ];
    }
}
