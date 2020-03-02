<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use SoftDeletes;
    // protected $guarded = [];
    protected $fillable =
    [
      'category_name',
      'added_by',
   ];

    function relationBetweenUser()
    {
      return $this->hasOne('App\User', 'id', 'added_by');
    }
   // END
 }
