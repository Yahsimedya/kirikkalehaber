<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'image',
        'status',
        'mail',
        'facebook',
        'twitter',
        'youtube',

    ];
    public function scopeStatus($query) {
        return $query->where('status',1);
    }
    public function scopeDrafted($query) {
        return $query->where('status',0);
    }
}
