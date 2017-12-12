<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id'
    ];

    public function sets(){
      return $this->belongsTo('App\User', 'user_id');
    }

    public function links(){
      return $this->belongsToMany(Link::class);
    }
}
