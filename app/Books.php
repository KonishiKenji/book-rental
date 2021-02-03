<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
  //protected $connection = 'laravel';
  protected $table = 'books';
  protected $guarded = array('id');
  public $timestamps = false;

  public function users()
  {
    return $this->hasMany('users');
    // return $this->belongsTo('users');
  }

  public function rent_logs()
  {
    // return $this->hasMany('rent_logs');
    return $this->belongsTo('rent_logs');
  }
}
