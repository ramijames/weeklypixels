<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LightboxLink extends Model
{
    protected $fillable= ['link_id'];

    public function links(){
      return $this->belongsTo('App\Link', 'link_id');
    }
}
