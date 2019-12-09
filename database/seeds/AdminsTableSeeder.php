<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jerd_admins')->insert([
            'username' => 'admin1',
            'password' => 'pw1',
            'school_id' => '1'
        ]);

        DB::table('jerd_admins')->insert([
            'username' => 'admin2',
            'password' => 'pw2',
            'school_id' => '2'
        ]);

        DB::table('jerd_admins')->insert([
            'username' => 'admin3',
            'password' => 'pw3',
            'school_id' => '3'
        ]);
    }
}
