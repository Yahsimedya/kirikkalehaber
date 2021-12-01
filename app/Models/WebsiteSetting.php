<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'adress',
        'phone',
        'email',
        'about',
        'defaultImage',

    ];
}
