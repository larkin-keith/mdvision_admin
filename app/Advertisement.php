<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'banner_id', 'carousel', 'product', 'function'
    ];

    public function banner()
    {
    	return $this->hasOne('App\Banner', 'id', 'banner_id');
    }

    public function articles()
    {
    	return $this->hasOne('App\Article');
    }

    public function products()
    {
    	return $this->hasOne('App\Product');
    }
}
