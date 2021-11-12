<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    protected $fillable = [
        'link',
        'ads',
        'category_id',
        'type',
        'status',
        'ad_code',

    ];
    public function adcategory() {
        return $this->belongsTo(AdCategory::class);
    }
}
