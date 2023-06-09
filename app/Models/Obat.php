<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public $incrementing = false;
    protected $primaryKey = 'kode_obat';

    public function getRouteKeyName()
    {
        return 'kode_obat';
    }

    public function category()
    {
        return $this->belongsTo(ObatCategory::class, 'kategori_obat', 'kode_obat');
    }
}
