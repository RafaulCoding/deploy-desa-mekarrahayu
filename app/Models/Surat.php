<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

        protected $fillable = [
        'user_id',
        'jenis_surat',
        'nomor_surat', // <-- PASTIKAN INI ADA
        'nama',
        'nik',
        'tempat_tgl_lahir',
        'pekerjaan',
        'agama',
        'status_kawin',
        'alamat',
        'keperluan',
        'data_tambahan',
        'status',
        'file_ktp', 
        'file_kk',  
        // ... kolom lainnya
         'catatan_staff',
         'catatan_kades',
         'tgl_persetujuan'
    ];

    protected $casts = [
        'data_tambahan' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
