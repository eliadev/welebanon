<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";
	protected $fillable = ['service_id', 'name_en', 'name_ar', 'description_en', 'description_ar', 'order'];
	
	
	public function service()
    {
        return $this->belongsTo('App\Service');
    }
	
}
