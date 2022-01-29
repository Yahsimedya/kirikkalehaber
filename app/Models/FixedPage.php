<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'content',
        'keyword',
        'description',
        'status',
    ];
    public function scopeStatus($query) {
        return $query->where('status',1);
    }
    public function scopeDrafted($query) {
        return $query->where('status',0);
    }
}
