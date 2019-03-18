<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PersmissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          Permission::updateOrCreate(['identifier' => 'users'], ['name' => 'User Management']);
          Permission::updateOrCreate(['identifier' => 'services'], ['name' => 'Services']);
          Permission::updateOrCreate(['identifier' => 'categories'], ['name' => 'Categories']);
          Permission::updateOrCreate(['identifier' => 'providers'], ['name' => 'Providers']);
    }
}
