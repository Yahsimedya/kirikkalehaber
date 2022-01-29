<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class AuthorsPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'authors_id',
        'text',
        'title',
        'status',
        'keywords',
        'description',
    ];
    public function author() {
        return $this->belongsTo(Authors::class,'authors_id');
    }
    public function scopeStatus($query) {
        return $query->where('status',1);
    }
    public function scopeDrafted($query) {
        return $query->where('status',0);
    }
}
