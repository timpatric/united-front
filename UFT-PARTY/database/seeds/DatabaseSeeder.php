<?php

use Illuminate\Database\Seeder;

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
           $user = factory(App\User::class)->create([
             'name' => 'timo@admin',
             'email' => 'timopatrick9@gmail.com',
             'password' => bcrypt('@uft'),
         ]);
    }
}
