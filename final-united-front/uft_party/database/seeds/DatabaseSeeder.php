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
             'name' => 'jed@admin',
             'email' => 'jed@gmail.com',
             'password' => bcrypt('1'),
         ]);
    }
}
