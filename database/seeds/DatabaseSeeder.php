<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $user = array(
            'name' => 'John Doe',
            'email' => 'joh@doe.com',
            'password' => bcrypt('1234')
        );
        App\User::create($user);

        // $this->call(UsersTableSeeder::class);
    }
}
