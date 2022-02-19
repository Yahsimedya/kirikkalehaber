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
        'apps',
        'subscription',
        'category1',
        'category2',
        'category3',
        'category4',
        'multiple_category',
        'fotogaleri',
        'videogaleri',
        'gazetesayisi',
    ];

}
