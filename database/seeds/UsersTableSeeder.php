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
        DB::table('jerd_users')->insert([
            'first_name' => 'Tania',
            'last_name' => 'Hippert',
            'date_of_birth' => '1980-05-05',
            'username' => 'Hippert1',
            'password' => 'test',
            'role' => 'Teacher'
        ]);
        
        DB::table('jerd_users')->insert([
            'first_name' => 'Surya',
            'last_name' => 'Schneider',
            'date_of_birth' => '1980-05-05',
            'username' => 'Schneider1',
            'password' => 'test',
            'role' => 'Teacher'
        ]);
        
        DB::table('jerd_users')->insert([
            'first_name' => 'Reginald',
            'last_name' => 'Wagner',
            'date_of_birth' => '1980-05-05',
            'username' => 'Wagner1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);
        
        DB::table('jerd_users')->insert([
            'first_name' => 'Isabelle',
            'last_name' => 'Holmes',
            'date_of_birth' => '1980-05-05',
            'username' => 'Holmes1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);
        
        DB::table('jerd_users')->insert([
            'first_name' => 'Bonnie',
            'last_name' => 'Nilles',
            'date_of_birth' => '1980-05-05',
            'username' => 'Nilles1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);
        
        DB::table('jerd_users')->insert([
            'first_name' => 'Myriam',
            'last_name' => 'Reuter',
            'date_of_birth' => '1980-05-05',
            'username' => 'Reuter1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);
        
        DB::table('jerd_users')->insert([
            'first_name' => 'Yannick',
            'last_name' => 'Wolff',
            'date_of_birth' => '1980-05-05',
            'username' => 'Wolff1',
            'password' => 'test',
            'role' => 'MaRe'
        ]);
        
        DB::table('jerd_users')->insert([
            'first_name' => 'Andrea',
            'last_name' => 'Thill',
            'date_of_birth' => '1980-05-05',
            'username' => 'Thill1',
            'password' => 'test',
            'role' => 'MaRe'
        ]);
    }
}

