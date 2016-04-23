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
        'title', 'banner_url'
    ];

    public function scopeEnable($query)
    {
    	return $query->where('status', 'enable');
    }
}
