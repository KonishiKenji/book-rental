<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent_logs extends Model
{
  //protected $connection = 'laravel';
  protected $table = 'rent_logs';
  protected $guarded = array('id');
  public $timestamps = false;

  public function users()
  {
    return $this->hasMany('users');
    // return $this->belongsTo('users');
  }

  public function books()
  {
    return $this->hasMany('books');
    // return $this->belongsTo('books');
  }

}
