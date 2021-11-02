<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sehirler extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'sehir_ad',
        'ilce_id',
    ];
}
