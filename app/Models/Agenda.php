<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table = "agenda";
    protected $guarded = [];
    protected $dates = [
        'tanggal_surat',
        'tanggal_st',
        'dari_tanggal',
        'sampai_tanggal',
        'dl_1',
        'dl_2',
        'dl_3',
        'tdt_kaper',
        'tanggal_laporan',
        'tanggal_copy_jilid',
        'kembali_dari_jilid',
    ];

    public function pegawai()
    {
        return $this->belongsToMany(Pegawai::class);
    }
}
