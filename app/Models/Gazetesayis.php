<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gazetesayis extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title_tr',
        'image',
        'date',
        'status',
    ];
}
