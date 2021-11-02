<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
