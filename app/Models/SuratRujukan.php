<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratRujukan extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'surat_rujukan';
    protected $primaryKey = 'kode_rujukan';
    protected $keyType = 'string';

    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class, 'kode', 'kode_rekammedis');
    }
}
