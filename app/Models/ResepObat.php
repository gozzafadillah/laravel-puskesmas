<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepObat extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'resep_obat';
    protected $primarykey = 'kode_resep_obat';
}
