<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'origin', 'origin_id', 'target', 'target_id'
    ];

    public function article()
    {
    	return $this->hasOne('App\Article', 'id', 'origin_id');
    }

    public function product()
    {
    	return $this->hasOne('App\Product', 'id', 'origin_id');
    }

    public static function ofStore($origin, $originId, $target, $targetId)
    {
    	$relationDatas = [];
        if (! empty($originId) && is_array($originId)) {
            foreach ($originId as $value) {
                $relationDatas[] = [
                    'origin' => $origin, 
                    'origin_id' => $value, 
                    'target' => $target, 
                    'target_id' => $targetId, 
                ];
            }
        } elseif (! empty($originId)) {
        	$relationDatas = [
                'origin' => $origin, 
                'origin_id' => $originId, 
                'target' => $target, 
                'target_id' => $targetId, 
            ];
        }

        // var_dump($relationDatas);exit;

        return Relation::insert($relationDatas);
    }

}
