<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaPembayaran extends Model
{
    use HasFactory;

    protected $table = 'nota_pembayaran';
    protected $guarded = [];
}
