<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function editValidates(Request $request)
    {
        // userデータの編集バリデーション
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        if ($validator->fails()) {
            return redirect('edit')
            ->withErrors($validator)
            ->withInput();
        } else {
            return $this->update($request);
        }
    }

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
            abort(401);
            return redirect('edit');
        }

        //不要な「_token」の削除
        unset($user_form['_token']);
        //保存
        $user->fill($user_form)->save();
        \Session::flash('message', '変更されました');
        return redirect('edit');
    }
}
