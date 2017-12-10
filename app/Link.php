<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable= ['title', 'address','rating','site_id'];

    public function sites(){
      return $this->belongsTo('App\Site', 'site_id');
    }

    public function sets(){
      return $this->belongsToMany(Set::class);
    }
}
