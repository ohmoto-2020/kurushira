<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\CarImage;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 検索結果
    public function result(Request $request)
    {
        $result = History::addResultCarsFromDb($request);

        if (!$result) { // 未ログイン時はログイン画面へリダイレクト
            return redirect('login');
        } else {
            $match_cars = Car::getSearchCarsFromDb($request);
            $selected_value =
            [
                'style' => $request->style,
                'size' => $request->size,
                'country' => $request->country,
                'uses' => $request->uses
            ];

            return view('page.result', ['match_cars' => $match_cars,'selected_value' => $selected_value]);
        }
    }

    // 前回の履歴
    public function history()
    {
        $match_cars = History::getHistoryHistoriesFromDb();
        if(empty($match_cars[0]->toArray())){
            return view('auth.my_page', ['match_cars' => $match_cars[0]]);
        } else {
            $history_value =
            [
                'style' => $match_cars[0][0]['style'],
                'size' => $match_cars[0][0]['size'],
                'country' => $match_cars[0][0]['country'],
                'uses' => $match_cars[0][0]['uses'],
                'updated_at' => $match_cars[1][0]['updated_at'],
            ];
            $match_cars = $match_cars[0];
            return view('auth.my_page', ['match_cars' => $match_cars,'history_value' => $history_value]);
        }
    }

    // 画像提供
    public function post_car()
    {
        $car_array = Car::getCarsFromDb();
        return view('page.post_car', ['car_array' => $car_array]);
    }

    // 画像保存
    public function create(Request $request)
    {
        $post = new CarImage;
        $form = $request->all();
        if (array_key_exists('maker', $form)) { //メーカーを選択しているか
            $array = array_keys($form); //メーカーキーの取得
            $search = array_search($form['maker'], $array);
            $match = $form[$array[$search]];
            $cars = Car::where('name', $match)->get();

            if (!is_null($match)) { //車種を選択しているか
                // 二重送信防止
                // $request->session()->regenerateToken();
                //s3アップロード開始
                $image = $request->file('file');

                if (file_exists($image) == true) { //画像を選択しているか
                    // バケットの`myprefix`フォルダへアップロード
                    $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
                    // アップロードした画像のフルパスを取得
                    $post->image = Storage::disk('s3')->url($path);
                    $post->car_id = $cars[0]['id'];
                    $post->save();
                    // $car = CarImage::select()->join('cars', 'cars.id', '=', 'car_images.car_id')->orderBy('updated_at', 'desc')->take(1)->get();
                    $car = CarImage::orderBy('updated_at', 'desc')->take(1)->get();
                    return view('page.offer', ['cars' => $car,'car_name' => $cars]);
                } else {
                    \Session::flash('message', '画像を選択してください');
                    return redirect('post_car');
                }
            } else {
                \Session::flash('message', '車種を選択してください');
                return redirect('post_car');
            }
        } else {
            \Session::flash('message', 'メーカーを選択してください');
            return redirect('post_car');
        }
    }
}
