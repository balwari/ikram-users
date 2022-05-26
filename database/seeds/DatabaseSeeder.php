<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '8459678596',
            'country' => 'India',
            'state' => 'AP',
            'city' => 'Kurnool',
            'pincode' => 518001,
            'password' => bcrypt(12345),
            'confirm_password' => bcrypt(12345),
            'is_admin' => 1,
            'status' => 1
        ]);
        // factory(App\User::class, 10)->create();

        // $this->call(UsersTableSeeder::class);
    }
}
