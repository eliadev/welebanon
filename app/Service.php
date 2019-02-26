<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table="services";
	protected $fillable = ['name_en', 'name_ar', 'icon'];
    protected $guarded = [];

	public function category()
    {
        return $this->hasMany('App\Category');
    }
}
