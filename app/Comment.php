<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
       'name', 'comment', 'article_id'
   ];

   protected $attributes = [
      'name' => 'nonymous'
    ];
   public $timestamps = false;

   public function article()
   {
    return $this->belongsTo('App\Article');
    }
}
