<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_en',
        'subcategory_tr',
        'subcategory_keywords',
        'subcategory_description',
        'subcategory_status',
        'subcategory_order',

    ];
}
