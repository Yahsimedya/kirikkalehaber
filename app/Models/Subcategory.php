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
    public function scopeStatus($query) {
        return $query->where('subcategory_status',1);
    }
    public function scopeDrafted($query) {
        return $query->where('subcategory_status',0);
    }


}
