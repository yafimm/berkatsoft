<?php

use Illuminate\Database\Seeder;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Role::create([
            'role_name' => 'User',
            'access' => 1,
      ]);

      \App\Role::create([
            'role_name' => 'Admin',
            'access' => 10,
      ]);
    }
}
