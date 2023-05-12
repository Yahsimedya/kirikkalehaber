<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class authorscommentsModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'details',
        'authors_posts_id',
        'created_at',
    ];
    protected $table = 'authorscomments'; // Add this line to specify the table

    public function scopeStatus($query)
    {
        return $query->where('status', 1);
    }
    public function scopeDrafted($query)
    {
        return $query->where('status', 0);
    }
}
