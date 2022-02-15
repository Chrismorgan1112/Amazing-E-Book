<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('accounts')->insert([
            'role_id' => 1,
            'gender_id' => 1,
            'first_name' => 'Chrismorgan',
            'last_name' => 'Shintaro',
            'email' => 'chris@gmail.com',
            'password' => bcrypt('chris1234'),
            'delete_flag' => 0,
            'display_picture_link' => 'images/profileChris.png'
        ]);
    }
}
