<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'details',
        'posts_id',
        'created_at',
    ];
//    public function posts(){
//        return $this->hasmany(Post::class);
//    }
}
