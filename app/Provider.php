<?php

namespace App;

use App;
use Illuminate\Support\Str;
use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Provider extends Model implements HasMedia
{
	use HasMediaTrait, HasTranslations;
	
	protected $table="providers";
	protected $fillable = ['category_id','name_en', 'name_ar', 'description_en', 'description_ar', 'address_en', 'address_ar', 'longitude', 'latitude', 'featured', 'points'];
	protected $appends = ['tag_list'];
	
	protected $translatableFields = [ 'name', 'description', 'address' ];
	
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
        $this->addMediaConversion('thumb-medium')
            ->width(250)
            ->height(176);

        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }
	
	public function getTagListAttribute()
    {
        $tags = $this->tags->pluck('name')->toArray();
        return implode("," , $tags);
    }
	
	public function getShortDescriptionAttribute()
    {
        $string = preg_replace('/\s+/mu', ' ', $this->translate('description'));
        $string = str_replace('&nbsp;', '', $string);
        return Str::limit( strip_tags($string), 75);
    }

    public function getDescriptionAttribute()
    {
        return $this->translate('description');
    }
	
}
