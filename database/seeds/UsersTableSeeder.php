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
            'first_name' => 'Test1',
            'last_name' => 'Test',
            'date_of_birth' => '1980-05-05',
            'username' => 'TestTeacher1',
            'password' => 'test',
            'role' => 'Teacher',
        ]);
        DB::table('jerd_users')->insert([
            'first_name' => 'Test2',
            'last_name' => 'Test',
            'date_of_birth' => '1980-05-05',
            'username' => 'TestTeacher2',
            'password' => 'test',
            'role' => 'Teacher',
        ]);
        DB::table('jerd_users')->insert([
            'first_name' => 'Test3',
            'last_name' => 'Test',
            'date_of_birth' => '1980-05-05',
            'username' => 'TestParent1',
            'password' => 'test',
            'role' => 'Guardian',
        ]);
        DB::table('jerd_users')->insert([
            'first_name' => 'Test4',
            'last_name' => 'Test',
            'date_of_birth' => '1980-05-05',
            'username' => 'TestParent2',
            'password' => 'test',
            'role' => 'Guardian',
        ]);
        DB::table('jerd_users')->insert([
            'first_name' => 'Test5',
            'last_name' => 'Test',
            'date_of_birth' => '1980-05-05',
            'username' => 'TestParent3',
            'password' => 'test',
            'role' => 'Guardian',
        ]);
        DB::table('jerd_users')->insert([
            'first_name' => 'Test6',
            'last_name' => 'Test',
            'date_of_birth' => '1980-05-05',
            'username' => 'TestParent4',
            'password' => 'test',
            'role' => 'Guardian',
        ]);
        DB::table('jerd_users')->insert([
            'first_name' => 'Test7',
            'last_name' => 'Test',
            'date_of_birth' => '1980-05-05',
            'username' => 'TestMaRe1',
            'password' => 'test',
            'role' => 'MaRe',
        ]);
        DB::table('jerd_users')->insert([
            'first_name' => 'Test8',
            'last_name' => 'Test',
            'date_of_birth' => '1980-05-05',
            'username' => 'TestMaRe2',
            'password' => 'test',
            'role' => 'MaRe',
        ]);
    }
}

