<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = "pegawai";
    protected $guarded = [];

    public function agenda()
    {
        return $this->belongsToMany(Agenda::class);
    }
}
