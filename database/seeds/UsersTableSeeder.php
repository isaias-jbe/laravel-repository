<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'name'       => 'Isaias',
           'email'      => 'manoelisaiasa@gmail.com',
           'password'   => bcrypt(123456),
        ]);
    }
}
