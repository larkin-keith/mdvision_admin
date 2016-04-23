<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'infomation', 'main_image', 'content'
    ];

    // public function getCreatedAtAttribute($data)
    // {
    // 	$time = Carbon::create($data);
    // 	return $time->toFormattedDateString();
    // }
}
