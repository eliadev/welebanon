<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Provider extends Model implements HasMedia
{
	use HasMediaTrait;
	
	protected $table="providers";
	protected $fillable = ['category_id','name_en', 'name_ar', 'description_en', 'description_ar', 'address_en', 'address_ar', 'longitude', 'latitude'];
	protected $appends = ['tag_list'];
	
	public function category()
    {
        return $this->belongsTo('App\Category');
    }
	
	public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
	
	public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }
	
	public function getTagListAttribute()
    {
        $tags = $this->tags->pluck('name')->toArray();
        return implode("," , $tags);
    }
}
