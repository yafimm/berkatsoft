<?php

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
      \App\User::create([
          'username' => 'userpengguna',
          'password' => bcrypt('userpengguna'),
          'name' => 'userpengguna',
          'role_id' => 1,
          'email' => 'userpengguna@gmail.com',
          'address' => 'Jl. Jalan Road no 21, Kecamatan, Kota Bandung',
          'phone_number' => '087123123123',
      ]);

      \App\User::create([
          'username' => 'myadmin',
          'password' => bcrypt('myadmin'),
          'name' => 'I am Admin',
          'role_id' => 1,
          'email' => 'admin@gmail.com',
          'address' => 'Jl. Jalan Road no 21, Kecamatan, Kota Bandung',
          'phone_number' => '0888181818',
      ]);
    }
}
