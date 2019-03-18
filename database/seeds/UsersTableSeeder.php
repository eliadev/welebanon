<?php

use App\User;
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
        factory(User::class)->create([
        	'first_name' => 'Sarah',
        	'last_name' => 'Araijy',
        	'email' => 'sarah@bridgeofmind.com',
        	'is_superadmin' => 1,
        	'password' => bcrypt('123456')
        ]);
    }
}
