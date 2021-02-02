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
        $match_car = Car::where('style',$request->style)->where('size',$request->size)->where('country',$request->country)->where('uses',$request->uses)->paginate(5)->appends('style',$request->style)->appends('size',$request->size)->appends('country',$request->country)->appends('uses',$request->uses);
        $match_car = ['style' => $request->style,'size' => $request->size,'country' => $request->country,'uses' => $request->uses,'match_car' => $match_car];
        return $match_car;
    }
}
