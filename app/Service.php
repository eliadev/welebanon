<?php

namespace App;

use App;
use Illuminate\Support\Str;
use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Service extends Model implements HasMedia
{
	use HasMediaTrait, HasTranslations;

    protected $table="services";
	protected $fillable = ['name_en', 'name_ar', 'icon', 'description_en', 'description_ar', 'order'];

	protected $translatableFields = [ 'name', 'description' ];
	
	public function category()
    {
        return $this->hasMany('App\Category');
    }
	
	public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }

    public function getShortDescriptionAttribute()
    {
        return Str::limit( $this->translate('description'), 20);
    }

    public function getDescriptionAttribute()
    {
        return $this->translate('description');
    }
}
