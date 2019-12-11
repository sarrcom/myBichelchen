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

        // teachers

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
            'first_name' => 'Gonzalo',
            'last_name' => 'Seifert',
            'date_of_birth' => '1980-05-05',
            'username' => 'Seifert1',
            'password' => 'test',
            'role' => 'Teacher'
        ]);

        DB::table('jerd_users')->insert([
            'first_name' => 'Lucius',
            'last_name' => 'Peasley',
            'date_of_birth' => '1980-05-05',
            'username' => 'Peasley1',
            'password' => 'test',
            'role' => 'Teacher'
        ]);

        // guardians

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
            'first_name' => 'Esther',
            'last_name' => 'Merkel',
            'date_of_birth' => '1980-05-05',
            'username' => 'Merkel1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);

        DB::table('jerd_users')->insert([
            'first_name' => 'Timmy',
            'last_name' => 'Warfel',
            'date_of_birth' => '1980-05-05',
            'username' => 'Warfel1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);

                DB::table('jerd_users')->insert([
            'first_name' => 'Nilsa',
            'last_name' => 'Keagle',
            'date_of_birth' => '1980-05-05',
            'username' => 'Keagle1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);

                DB::table('jerd_users')->insert([
            'first_name' => 'Shasta',
            'last_name' => 'Vorpahl',
            'date_of_birth' => '1980-05-05',
            'username' => 'Vorpahl1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);

                DB::table('jerd_users')->insert([
            'first_name' => 'Alena',
            'last_name' => 'Holder',
            'date_of_birth' => '1980-05-05',
            'username' => 'Holder1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);

                DB::table('jerd_users')->insert([
            'first_name' => 'Amberly',
            'last_name' => 'Crandle',
            'date_of_birth' => '1980-05-05',
            'username' => 'Crandle1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);

                DB::table('jerd_users')->insert([
            'first_name' => 'Nan',
            'last_name' => 'Ruple',
            'date_of_birth' => '1980-05-05',
            'username' => 'Ruple1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);

                DB::table('jerd_users')->insert([
            'first_name' => 'Mozelle',
            'last_name' => 'Demott',
            'date_of_birth' => '1980-05-05',
            'username' => 'Demott1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);

                DB::table('jerd_users')->insert([
            'first_name' => 'Mauro',
            'last_name' => 'Birmingham',
            'date_of_birth' => '1980-05-05',
            'username' => 'Birmingham1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);

                DB::table('jerd_users')->insert([
            'first_name' => 'Eboni',
            'last_name' => 'Garnica',
            'date_of_birth' => '1980-05-05',
            'username' => 'Garnica1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);

                DB::table('jerd_users')->insert([
            'first_name' => 'Woodrow',
            'last_name' => 'McGown',
            'date_of_birth' => '1980-05-05',
            'username' => 'McGown1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);

                DB::table('jerd_users')->insert([
            'first_name' => 'Jannie',
            'last_name' => 'Whittington',
            'date_of_birth' => '1980-05-05',
            'username' => 'Whittington1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);

                DB::table('jerd_users')->insert([
            'first_name' => 'Elidia',
            'last_name' => 'Blackstock',
            'date_of_birth' => '1980-05-05',
            'username' => 'Blackstock1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);

                DB::table('jerd_users')->insert([
            'first_name' => 'Britteny',
            'last_name' => 'Chambers',
            'date_of_birth' => '1980-05-05',
            'username' => 'Chambers1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);

                DB::table('jerd_users')->insert([
            'first_name' => 'Elizabeth',
            'last_name' => 'McRae',
            'date_of_birth' => '1980-05-05',
            'username' => '1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);

                DB::table('jerd_users')->insert([
            'first_name' => 'Craig',
            'last_name' => 'Glaspie',
            'date_of_birth' => '1980-05-05',
            'username' => 'Glaspie1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);

                DB::table('jerd_users')->insert([
            'first_name' => 'Cyrus',
            'last_name' => 'Kohl',
            'date_of_birth' => '1980-05-05',
            'username' => 'Kohl1',
            'password' => 'test',
            'role' => 'Guardian'
        ]);


        // mare

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

