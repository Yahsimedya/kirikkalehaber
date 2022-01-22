<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'category_en',
        'category_tr',
        'category_keywords',
        'category_description',
        'category_icon',
        'category_status',
        'category_order',
        'category_menu',
        'categorycolor',

    ];

    protected static function boot() {
        parent::boot();
        static::deleting(function($category) {
           $category->posts()->delete();
        });
    }
    public function posts(){
        return $this->hasmany(Post::class);
    }
}
