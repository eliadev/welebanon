<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $table="tags";
	protected $fillable = ['name'];

    public $timestamps = false;
 
	public function provider()
    {
        return $this->belongsToMany('App\Provider');
    }
}
  