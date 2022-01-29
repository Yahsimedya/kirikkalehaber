<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photocategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_title',
        'status',
        'keywords_tr',
        'description_tr',
        'keywords_en',
        'description_en',
        'district_order',

    ];
    public function scopeStatus($query) {
        return $query->where('status',1);
    }
    public function scopeDrafted($query) {
        return $query->where('status',0);
    }
}
