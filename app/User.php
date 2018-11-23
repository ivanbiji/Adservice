<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use Notifiable;
    use Searchable;

    public function toSearchableArray()
    {
        $array = $this->toArray();

        return array('name' => $array['name'], 'email' => $array['email'],'mobno' => $array['mobno'],'id' => $array['id']);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','mobno', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    
}
