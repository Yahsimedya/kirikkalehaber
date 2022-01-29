<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'adress',
        'phone',
        'email',
        'about',
        'defaultImage',

    ];
    public function scopeStatus($query) {
        return $query->where('status',1);
    }
    public function scopeDrafted($query) {
        return $query->where('status',0);
    }
}
