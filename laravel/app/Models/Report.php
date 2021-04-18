<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    // リレーション
    public function car_image()
    {
        return $this->belongsTo('App\Models\CarImage');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
