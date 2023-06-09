<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'rekam_medis';
    protected $primaryKey = 'kode';

    public function getRouteKeyName()
    {
        return 'kode';
    }
}
