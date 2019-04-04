<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'country', 'phone', 'date_of_birth', 'password', 'is_superadmin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Permission relation.
     * 
     * @return type
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }

    /**
     * Check for a given permission
     * 
     * @param  [type]  $permission [description]
     * @return boolean             [description]
     */
    public function hasPermission($permission)
    {
        if($this->is_superadmin)
            return true;

        $userPermissions = $this->permissions->pluck('identifier')->toArray();
       
       return in_array($permission, $userPermissions);
    }

    /**
     * Has admin access accessor
     * 
     * @return [type] [description]
     */
    public function getHasAdminAccessAttribute()
    {
        return $this->is_superadmin || $this->permissions->count();
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }
}
