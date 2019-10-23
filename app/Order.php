<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'order';

  protected $primaryKey = 'id'; // or null

  public $incrementing = false;

  protected $fillable = [
      'id', 'user', 'admin' ,'total', 'status',
  ];

  public function product(){
    return $this->belongsToMany('App\product', 'order_detail', 'order_id', 'product_id')->withPivot('price', 'amount')->withTimestamps();
  }
}
