<?php

namespace App;

use App;
use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Slider extends Model implements HasMedia
{
	use HasMediaTrait, HasTranslations;

	protected $table="sliders";
	protected $fillable = ['name_en', 'name_ar', 'description_en', 'description_ar', 'order'];

	protected $translatableFields = [ 'name', 'description' ];
	
	
	public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }
}
