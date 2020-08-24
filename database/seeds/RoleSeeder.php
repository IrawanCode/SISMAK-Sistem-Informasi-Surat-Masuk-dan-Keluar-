<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role'      => 'Ketua BPS',
        ]);
        DB::table('roles')->insert([
            'role'      => 'Sub. Bag. TU',
        ]);
        DB::table('roles')->insert([
            'role'      => 'Sub. Bag. Kasie. Produksi',
        ]);
        DB::table('roles')->insert([
            'role'      => 'Sub. Bag. Kasie. Sosial',
        ]);
        DB::table('roles')->insert([
            'role'      => 'Sub. Bag. Kasie. Distribusi',
        ]);
        DB::table('roles')->insert([
            'role'      => 'Sub. Bag. Kasie. Nerwilis',
        ]);
        DB::table('roles')->insert([
            'role'      => 'Sub. Bag. Kasie. IPDS',
        ]);
        DB::table('roles')->insert([
            'role'      => 'Resepsionis',
        ]);
    }
}
