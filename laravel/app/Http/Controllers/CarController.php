<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
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

    public function result(Request $request)
    {
        // $match_car = Car::where('style',$request->style)->where('size',$request->size)->where('country',$request->country)->where('uses',$request->uses)->get();

        $match_car = Car::getSearchCarsFromDb($request);
        // dd($match_car);
        return view('page.result',['match_car' => $match_car]);
    }


}
