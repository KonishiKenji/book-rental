<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //protected $connection = 'laravel';
    protected $table = 'users';
    protected $guarded = array('id');
    public $timestamps = false;

    public function books()
    {
      // return $this->hasMany('books');
      return $this->belongsTo('books');
    }

    public function rent_logs()
    {
      // return $this->hasMany('rent_logs');
      return $this->belongsTo('rent_logs');
    }

}
