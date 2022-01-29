<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo',
        'title',
        'photocategory_id',
        'status',
        'photo_text',


    ];
    public function scopeStatus($query) {
        return $query->where('status',1);
    }
    public function scopeDrafted($query) {
        return $query->where('status',0);
    }
}
