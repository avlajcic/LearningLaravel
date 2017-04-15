<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
       'name', 'comment', 'post_id'
   ];
   
   protected $attributes = [
      'name' => 'nonymous'
    ];
   public $timestamps = false;
}
