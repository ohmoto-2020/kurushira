<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\History;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function post_car()
    {
        $car_array = Car::getCarsFromDb();
        return view('page.post_car',['car_array' => $car_array]);
    }

    public function store(Request $request)
    {
        // $table = 'history';
        // //ブログのデータを受け取る
        // $inputs = $request->all();
        // \DB::beginTransaction();
        // //ブログを登録
        // Car::create($inputs);
        // \DB::commit();
    }

    public function result(Request $request)
    {
        History::addResultCarsFromDb($request);
        $match_car = Car::getSearchCarsFromDb($request);
        return view('page.result',['match_car' => $match_car]);
    }

}
