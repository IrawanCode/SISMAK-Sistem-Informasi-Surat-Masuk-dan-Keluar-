<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('users')->insert([
      'email'     =>'admin@gmail.com',
      'name'      =>'Daigo',
      'role_id'   =>'1',
      'nip'       =>'172410101135',
      'phone'     =>'888777444333',
      'alamat'    =>'Jatigono',
      'foto'      =>'default.jpg',
      'password'  =>Hash::make('admin123'),
    ]);
    DB::table('users')->insert([
      'email'     =>'user@gmail.com',
      'name'      =>'User',
      'role_id'   =>'2',
      'nip'       =>'172410101135',
      'phone'     =>'888777444333',
      'alamat'    =>'Jatigono',
      'foto'      =>'default.jpg',
      'password'  =>Hash::make('user123'),
    ]);
    DB::table('users')->insert([
      'email'     =>'diablo@gmail.com',
      'name'      =>'diablo',
      'role_id'   =>'3',
      'nip'       =>'172410101135',
      'phone'     =>'888777444333',
      'alamat'    =>'Jatigono',
      'foto'      =>'default.jpg',
      'password'  =>Hash::make('diablo123'),
    ]);
    DB::table('users')->insert([
      'email'     =>'user2@gmail.com',
      'name'      =>'User2',
      'role_id'   =>'4',
      'nip'       =>'172410101135',
      'phone'     =>'888777444333',
      'alamat'    =>'Jatigono',
      'foto'      =>'default.jpg',
      'password'  =>Hash::make('user123'),
    ]);
    DB::table('users')->insert([
      'email'     =>'user3@gmail.com',
      'name'      =>'User3',
      'role_id'   =>'5',
      'nip'       =>'172410101135',
      'phone'     =>'888777444333',
      'alamat'    =>'Jatigono',
      'foto'      =>'default.jpg',
      'password'  =>Hash::make('user3123'),
    ]);
    DB::table('users')->insert([
      'email'     =>'user4@gmail.com',
      'name'      =>'User4',
      'role_id'   =>'6',
      'nip'       =>'172410101135',
      'phone'     =>'888777444333',
      'alamat'    =>'Jatigono',
      'foto'      =>'default.jpg',
      'password'  =>Hash::make('user4123'),
    ]);
    DB::table('users')->insert([
      'email'     =>'user5@gmail.com',
      'name'      =>'user5',
      'role_id'   =>'7',
      'nip'       =>'172410101135',
      'phone'     =>'888777444333',
      'alamat'    =>'Jatigono',
      'foto'      =>'default.jpg',
      'password'  =>Hash::make('user5123'),
    ]);
    DB::table('users')->insert([
      'email'     =>'user6@gmail.com',
      'name'      =>'User6',
      'role_id'   =>'8',
      'nip'       =>'172410101135',
      'phone'     =>'888777444333',
      'alamat'    =>'Jatigono',
      'foto'      =>'default.jpg',
      'password'  =>Hash::make('user6123'),
    ]);
  }
}
