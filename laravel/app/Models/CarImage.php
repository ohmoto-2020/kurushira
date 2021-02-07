<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    // テーブル定義
    protected $table = 'car_images';

    // リレーション
    public function car()
    {
        return $this->belongsTo('App\Models\Car');
    }

}
