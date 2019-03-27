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
        User::updateOrCreate(['email' => 'sarah@bridgeofmind.com'], [
        	'first_name' => 'Sarah',
        	'last_name' => 'Araijy',
        	'is_superadmin' => 1,
        	'password' => bcrypt('123456')
        ]);
    }
}
