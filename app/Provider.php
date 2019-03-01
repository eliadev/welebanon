<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
	protected $table="providers";
	protected $fillable = ['name_en', 'name_ar', 'icon', 'order'];
	
	public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
