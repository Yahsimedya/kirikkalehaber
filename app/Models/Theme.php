<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'header',
        'slider_title',
        'siteColorTheme',
        'economy',
        'agenda',
        'politics',
        'sport',

    ];
}
