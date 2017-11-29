<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public function links(){
      return $this->hasMany(Link::class);
    }
}
