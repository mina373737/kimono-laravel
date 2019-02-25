<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  protected $guarded = array('id');
  
    public static $rules = array(
        'productsName' => 'required',
        'productsPrice' => 'required',
        'image_path' => 'required',
    );
    //
}
