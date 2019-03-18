<?php

namespace App;

use App;
use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	use HasTranslations;

    protected $table="services";
	protected $fillable = ['name_en', 'name_ar', 'icon', 'order'];

	protected $translatableFields = [ 'name' ];
	
	public function category()
    {
        return $this->hasMany('App\Category');
    }
}
