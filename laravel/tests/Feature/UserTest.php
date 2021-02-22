<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    //ログイン画面を表示
    public function testLoginView()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $this->assertGuest();
    }
}
