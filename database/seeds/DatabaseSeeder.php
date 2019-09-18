<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $location = "Cộng tác viên,Quản trị viên,Admin";
        $explode = explode(',',$location);
        foreach($explode as $ex)
        {
            DB::table('role')->insert([
                'name' => $ex
            ]);
        }
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'status' => '1',
            'level' => '3',
            'created_at' => now(),
            'password' => bcrypt('12345678') // password :12345678
        ]);
    }
}
