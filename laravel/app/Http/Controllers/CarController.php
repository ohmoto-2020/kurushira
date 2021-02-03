<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    // 画像提供
    public function post_car()
    {
        $car_array = Car::getCarsFromDb();
        return view('page.post_car',['car_array' => $car_array]);
    }
    // 検索結果
    public function result(Request $request)
    {
        $result = History::addResultCarsFromDb($request);
        // 未ログイン時はログイン画面へリダイレクト
        if(!$result){
            return redirect('login');
        } else {
            $match_car = Car::getSearchCarsFromDb($request);
            return view('page.result',['match_car' => $match_car]);
        }
    }
    // 前回の履歴
    public function history()
    {
        $match_car = History::getHistoryHistoriesFromDb();
        return view('auth.my_page',['match_car' => $match_car]);
    }
}
