<?php

use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'adminFullName' => 'Wan Shaharudin',
            'adminUserName' => 'wnshah_',
            'adminPhoneNo' => '01165642994',
            'email' => 'wanshah@gmail.com',
            'password' =>  Hash::make('password'),
            'remember_token' => str_random(10),
        ]);
    }
}
