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
    public function result()
    {
        $car_array = Car::getCarsFromDb();
        return view('page.result',['car_array' => $car_array]);
    }

}
