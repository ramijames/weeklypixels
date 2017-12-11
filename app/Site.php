<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'shortname', 'link', 'selector', 'weight'
    ];

    public function links(){
      return $this->hasMany(Link::class);
    }
}
