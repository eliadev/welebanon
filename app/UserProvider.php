<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProvider extends Model
{
    protected $table="provider_user";

    protected $fillable = ['provider_id', 'user_id', 'from_date', 'to_date', 'nb_children', 'nb_adults', 'is_confirmed'];

    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }
}
