<?php

namespace App\Models;

// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //テーブル名
    // protected $table = 'cars';
    public static function getCarsFromDb()
    {
        $makers = ['トヨタ','レクサス','光岡自動車','ホンダ','マツダ','スバル','ダイハツ','スズキ','三菱','メルセデス・ベンツ','スマート','BMW','アウディ','フォルクスワーゲン','ミニ','ポルシェ','キャデラック','シボレー','ハマー','フォード','リンカーン','クライスラー','ダッジ','ジープ','テスラ','ロールス・ロイス','ベントレー','ランドローバー','アストンマーティン','ロータス','マクラーレン','ローバー','ケータハム','モーガン','ボルボ','プジョー','ルノー','シトロエン','DSオートモビル','ブガッティ','アルピーヌ','フィアット','アルファロメオ','フェラーリ','ランボルギーニ','マセラティ','アバルト','インフィニティ','米国トヨタ'];
        $car_array = array();
        foreach($makers as $maker){
            $cars = Car::where('maker',$maker)->get();
            $car_array[$maker] = $cars;
        }
        return $car_array;
    }

    public static function getSearchCarsFromDb(Request $request)
    {
        $match_car = Car::where('style',$request->style)->where('size',$request->size)->where('country',$request->country)->where('uses',$request->uses)->get();
        return $match_car;
    }
}
