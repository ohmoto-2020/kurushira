<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
}
