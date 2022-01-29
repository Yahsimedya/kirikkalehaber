<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = [
        'district_en',
        'district_tr',
        'district_keywords',
        'district_description',
        'district_icon',
        'district_status',
        'district_order',

    ];
    public function scopeStatus($query) {
        return $query->where('district_status',1);
    }
    public function scopeDrafted($query) {
        return $query->where('district_status',0);
    }
//    public function posts(){
//        return $this->hasMany(Post::class,'district_id');
//    }
//    public function posts(){
//        return $this->hasmany(Post::class);
//    }
}
