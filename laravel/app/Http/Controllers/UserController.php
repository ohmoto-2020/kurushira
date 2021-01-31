<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //userデータの編集
    public function edit() {
        return view('auth.edit', ['user' => Auth::user() ]);
    }

    //userデータの保存
    public function update(Request $request) {

        $user_form = $request->all();
        $user = Auth::user();
        // ゲストユーザーは変更できずに即リダイレクト
        if($user->id == 1){
            return redirect('edit');
        }

        //不要な「_token」の削除
        unset($user_form['_token']);
        //保存
        $user->fill($user_form)->save();
        return redirect('edit');
    }
}
