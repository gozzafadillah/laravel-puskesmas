<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "ruangan";

    public $incrementing = false;
    protected $primaryKey = 'kode';

    public function getRouteKeyName()
    {
        return 'kode';
    }

    // Model Ruangan
    public function poli()
    {
        return $this->belongsTo(Poli::class, 'kode', 'kode_ruangan');
    }
}
