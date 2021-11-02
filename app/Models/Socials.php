<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socials extends Model
{
    use HasFactory;
    protected $fillable = [
        'facebook',
        'twitter',
        'youtube',
        'linkedin',
        'instagram',

    ];
}
