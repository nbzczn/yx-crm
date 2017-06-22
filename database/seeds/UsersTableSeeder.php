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
        \App\Models\User::create([
            'id' => 1,
            'username' => 'sysadmin',
            'name' => '管理员',
            'password' => bcrypt('123456')
        ]);
        \App\Models\User::create([
            'id' => 2,
            'username' => 'clerk',
            'name' => '文员',
            'password' => bcrypt('123456')
        ]);
    }
}
