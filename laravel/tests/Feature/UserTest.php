<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
// use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    // ログイン画面を表示
    public function testLoginView()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $this->assertGuest();
    }

    // ダミーログイン
    private function dummyLogin()
    {
        $user = factory(User::class, 'default')->create();
        return $this->actingAs($user)
                    ->withSession(['user_id' => $user->id])
                    ->get(route('index')); // homeにリダイレクト
    }

    // ログイン処理を実行
    public function testLogin()
    {
        $this->assertGuest();
        // ダミーログイン
        $response = $this->dummyLogin();
        $response->assertStatus(200);
        // 認証を確認
        $this->assertAuthenticated();
    }

    //ログアウト
    public function testLogout()
    {
        // ダミーログイン
        $response = $this->dummyLogin();
        // 認証を確認
        $this->assertAuthenticated();
        $response = $this->post('/logout');
        // ホーム画面にリダイレクト
        $response->assertStatus(302)
                 ->assertRedirect('/'); // リダイレクト先を確認
        // 認証されていないことを確認
        $this->assertGuest();
    }

}
