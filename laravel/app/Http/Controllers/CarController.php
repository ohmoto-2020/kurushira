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
        if(empty($match_cars)){
            return view('auth.my_page', ['match_cars' => $match_cars]);
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
            return view('auth.my_page', ['match_cars' => $match_cars,'selected_value' => $history_value]);
        }
    }

    // 個々の提供画像一覧
    public function my_image() {
        $user_id = Auth::id();
        $my_images = CarImage::where('user_id',$user_id)->get();
        return view('auth.my_image',['my_images' => $my_images]);
    }

    // 提供画像削除
    public function delete(Request $request) {
        $image = $request->image;

        $s3_delete = Storage::disk('s3')->delete($image);
        $db_delete = CarImage::where('image',$image)->delete();
        \Session::flash('message', '削除しました');
        return redirect('my_image');
    }

    // 提供画像選択画面
    public function post_car()
    {
        $car_array = Car::getCarsFromDb();
        return view('page.post_car', ['car_array' => $car_array]);
    }

    // 画像保存
    public function create(Request $request)
    {
        $user = Auth::user();
        if($user->id == 1){ // ゲストユーザーはリダイレクト
            abort(401);
            return redirect('post_car');
        }
        $post = new CarImage;
        $form = $request->all();
        if (array_key_exists('maker', $form)) { // メーカーを選択しているか
            $array = array_keys($form); // メーカーキーの取得
            $search = array_search($form['maker'], $array);
            $match = $form[$array[$search]];
            $cars = Car::where('name', $match)->get();

            if (!is_null($match)) { // 車種を選択しているか
                // 二重送信防止
                $request->session()->regenerateToken();
                // s3アップロード開始
                $image = $request->file('file');

                if (file_exists($image) == true) { // 画像を選択しているか
                    // バケットのmyprefixフォルダへアップロード
                    $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
                    // アップロードした画像のフルパスを取得
                    $post->image = $path;
                    $post->car_id = $cars[0]['id'];
                    $post->user_id = Auth::id();
                    $post->save();
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
