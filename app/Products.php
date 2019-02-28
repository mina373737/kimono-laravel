<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'price' => 'required',
    );
    public function histories()
    {
      return $this->hasMany('App\History');
    }
    //
}
