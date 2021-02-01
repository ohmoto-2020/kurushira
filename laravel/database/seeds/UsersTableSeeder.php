<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        [
            'name' => 'ゲスト',
            'email' => 'guest@example.com',
            'password' => Hash::make('aaaaaaaa')
        ]);
    }
}
