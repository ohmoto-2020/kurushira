<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function post_car()
    {
        $car_array = Car::getCarsFromDb();
        return view('page.post_car',['car_array' => $car_array]);
    }

    // public function post_car()
    // {
    //     $toyota = Car::where('maker','トヨタ')->get();
    //     $lexus = Car::where('maker','レクサス')->get();
    //     $mitsuoka = Car::where('maker','光岡自動車')->get();
    //     $nissan = Car::where('maker','日産')->get();
    //     $honda = Car::where('maker','ホンダ')->get();
    //     $mazda = Car::where('maker','マツダ')->get();
    //     $subaru = Car::where('maker','スバル')->get();
    //     $daihatsu = Car::where('maker','ダイハツ')->get();
    //     $suzuki = Car::where('maker','スズキ')->get();
    //     $mitsubishi = Car::where('maker','三菱')->get();
    //     $benz = Car::where('maker','メルセデス・ベンツ')->get();
    //     $smart = Car::where('maker','スマート')->get();
    //     $bmw = Car::where('maker','BMW')->get();
    //     $audi = Car::where('maker','アウディ')->get();
    //     $vw = Car::where('maker','フォルクスワーゲン')->get();
    //     $mini = Car::where('maker','ミニ')->get();
    //     $porsche = Car::where('maker','ポルシェ')->get();
    //     $cadillac = Car::where('maker','キャデラック')->get();
    //     $chevrolet = Car::where('maker','シボレー')->get();
    //     $hummer = Car::where('maker','ハマー')->get();
    //     $ford = Car::where('maker','フォード')->get();
    //     $lincoln = Car::where('maker','リンカーン')->get();
    //     $chrysler = Car::where('maker','クライスラー')->get();
    //     $dodge = Car::where('maker','ダッジ')->get();
    //     $jeep = Car::where('maker','ジープ')->get();
    //     $tesla = Car::where('maker','テスラ')->get();
    //     $rr = Car::where('maker','ロールス・ロイス')->get();
    //     $bentley = Car::where('maker','ベントレー')->get();
    //     $land_rover = Car::where('maker','ランドローバー')->get();
    //     $astonmartin = Car::where('maker','アストンマーティン')->get();
    //     $lotus = Car::where('maker','ロータス')->get();
    //     $mclaren = Car::where('maker','マクラーレン')->get();
    //     $rover = Car::where('maker','ローバー')->get();
    //     $caterham = Car::where('maker','ケータハム')->get();
    //     $morgan = Car::where('maker','モーガン')->get();
    //     $volvo = Car::where('maker','ボルボ')->get();
    //     $peugeot = Car::where('maker','プジョー')->get();
    //     $renault = Car::where('maker','ルノー')->get();
    //     $citroen = Car::where('maker','シトロエン')->get();
    //     $ds = Car::where('maker','DSオートモビル')->get();
    //     $bugatti = Car::where('maker','ブガッティ')->get();
    //     $alpine = Car::where('maker','アルピーヌ')->get();
    //     $fiat = Car::where('maker','フィアット')->get();
    //     $romeo = Car::where('maker','アルファロメオ')->get();
    //     $ferrari = Car::where('maker','フェラーリ')->get();
    //     $lamborghini = Car::where('maker','ランボルギーニ')->get();
    //     $maserati = Car::where('maker','マセラティ')->get();
    //     $abarth = Car::where('maker','アバルト')->get();
    //     $infinity = Car::where('maker','インフィニティ')->get();
    //     $us_toyota = Car::where('maker','米国トヨタ')->get();

    //     return view('page.post_car',['cars' => [$toyota,$lexus,$mitsuoka,$nissan,$honda,$mazda,$subaru,$daihatsu,$suzuki,$mitsubishi,$benz,$smart,$bmw,$audi,$vw,$mini,$porsche,$cadillac,$chevrolet,$hummer,$ford,$lincoln,$chrysler,$dodge,$jeep,$tesla,$rr,$bentley,$land_rover,$astonmartin,$lotus,$mclaren,$rover,$caterham,$morgan,$volvo,$peugeot,$renault,$citroen,$ds,$bugatti,$alpine,$fiat,$romeo,$ferrari,$lamborghini,$maserati,$abarth,$infinity,$us_toyota]]);
    // }
}
