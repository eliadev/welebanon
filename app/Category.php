<?php

namespace App;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use HasTranslations;

    protected $table="categories";
	protected $fillable = ['service_id', 'name_en', 'name_ar', 'icon', 'description_en', 'description_ar', 'order'];
	
	protected $translatableFields = [ 'name', 'description' ];
	
	public function service()
    {
        return $this->belongsTo('App\Service');
    }
	
	public function providers()
    {
        return $this->hasMany('App\Provider');
    }
	
}
