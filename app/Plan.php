<?php

namespace App;

use App;
use Illuminate\Support\Str;
use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table="plans";
	protected $fillable = ['name_en', 'name_ar', 'description_en', 'description_ar', 'points', 'price'];

	protected $translatableFields = [ 'name', 'description' ];
}
