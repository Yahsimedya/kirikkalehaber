<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = [
        'district_en',
        'district_tr',
        'district_keywords',
        'district_description',
        'district_icon',
        'district_status',
        'district_order',

    ];
}
