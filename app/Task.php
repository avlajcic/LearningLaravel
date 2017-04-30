<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $fillable = [
       'title', 'dueDate', 'about', 'user_id'
   ];

   public $timestamps = false;

   public function user()
   {
    return $this->belongsTo('App\User');
   }
}
