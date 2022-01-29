<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;


    public function searchableAs()
    {
        return 'posts_index';
    }
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'district_id',
        'subdistrict_id',
        'user_id',
        'title_tr',
        'title_en',
        'subtitle_tr',
        'subtitle_en',
        'image',
        'details_tr',
        'details_en',
        'tags_tr',
        'tags_en',
        'keywords_tr',
        'description_tr',
        'keywords_en',
        'description_en',
        'manset',
        'story',
        'headline',
        'featured',
        'surmanset',
        'surmanset_photo',
        'bigthumbnail',
        'post_date',
        'post_month',
        'status',
        'posts_video',
        'headlinetag',
        'flahtag',
        'attentiontag',
        'publish_date',


    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }
    public function districts() {
        return $this->belongsTo(District::class,'district_id','id');
    }
    public function subdistricts() {
        return $this->belongsTo(Subdistrict::class);
    }
    public function comment() {
        return $this->belongsTo(Comments::class);
    }
    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }
//    public function tag()
//    {
//        return $this->morphToMany(Tag::class,'tags','post_tags');
//    }
    public function scopeStatus($query) {
        return $query->where('status',1);
    }
    public function scopeDrafted($query) {
        return $query->where('status',0);
    }
    public function getPublishedAttribute($query) {
        return ($this->is_published) ? 'Yes' : 'No';
    }
}
