<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'rekam_medis';
    // TODO refactor this kode RekamMedis
    protected $primaryKey = 'kode_rekammedis';

    public function antrian()
    {
        return $this->hasOne(Antrian::class, 'kode_antrian', 'antrian');
    }

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function suratRujukan()
    {
        return $this->hasOne(SuratRujukan::class, 'kode_rekammedis', 'kode_rekammedis');
    }

    public function resepObat()
    {
        return $this->belongsTo(ResepObat::class, 'kode_rekamedis', 'kode');
    }
}
