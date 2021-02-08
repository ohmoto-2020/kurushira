<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;

class History extends Model
{
    //可変項目
    protected $fillable =
    [
        'user_id',
        'style',
        'size',
        'country',
        'uses'
    ];

    protected $primaryKey = 'user_id';

    public static function addResultCarsFromDb(Request $request)
    {
        $user_id = Auth::id();
        $style = $request->style;
        $size = $request->size;
        $country = $request->country;
        $uses = $request->uses;
        if($user_id === null){
            return false;
        } else {
            $history_add = History::updateOrCreate(
            [
                'user_id' => $user_id
            ],
            [
                'user_id' => $user_id,
                'style' => $style,
                'size' => $size,
                'country' => $country,
                'uses' => $uses
            ]);

            return $history_add;
        }

    }

    public static function getHistoryHistoriesFromDb()
    {
        $user_id = Auth::id();
        $my_cars = History::where('user_id',$user_id)->get();
        if($my_cars->isEmpty()){
            return ;
        } else {
            $match_car = Car::where('style',$my_cars[0]['style'])
                                ->where('size',$my_cars[0]['size'])
                                ->where('country',$my_cars[0]['country'])
                                ->where('uses',$my_cars[0]['uses'])
                                ->get();
            $match_car =
            [
                'style' => $my_cars[0]['style'],
                'size' => $my_cars[0]['size'],
                'country' => $my_cars[0]['country'],
                'uses' => $my_cars[0]['uses'],
                'updated_at' => $my_cars[0]['updated_at'],
                'match_car' => $match_car
            ];

            return $match_car;
        }
    }
}
