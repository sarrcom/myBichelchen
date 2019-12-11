<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // klasse id = 1

        DB::table('jerd_students')->insert([
            'first_name' => 'Gregory',
            'last_name' => 'Lutz',
            'date_of_birth' => '2011-08-01',
            'klass_id' => '1',
        ]);

        DB::table('jerd_students')->insert([
            'first_name' => 'Debra',
            'last_name' => 'Guzman',
            'date_of_birth' => '2011-07-01',
            'klass_id' => '1',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Prince',
            'last_name' => 'Darden',
            'date_of_birth' => '2011-06-01',
            'klass_id' => '1',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Yoshie',
            'last_name' => 'Bensinger',
            'date_of_birth' => '2011-05-01',
            'klass_id' => '1',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Cristobal',
            'last_name' => 'Westrick',
            'date_of_birth' => '2011-04-01',
            'klass_id' => '1',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Vanessa',
            'last_name' => 'Dorsch',
            'date_of_birth' => '2011-03-01',
            'klass_id' => '1',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Sabina',
            'last_name' => 'Holz',
            'date_of_birth' => '2011-02-15',
            'klass_id' => '1',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Maggie',
            'last_name' => 'Devereaux',
            'date_of_birth' => '2011-09-01',
            'klass_id' => '1',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Karl',
            'last_name' => 'Eiler',
            'date_of_birth' => '2011-10-08',
            'klass_id' => '1',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Shizuko',
            'last_name' => 'Speirs',
            'date_of_birth' => '2011-11-01',
            'klass_id' => '1',
        ]);

        // klasse 2

        DB::table('jerd_students')->insert([
            'first_name' => 'Jason',
            'last_name' => 'Schroer',
            'date_of_birth' => '2011-08-01',
            'klass_id' => '2',
        ]);

        DB::table('jerd_students')->insert([
            'first_name' => 'Lorilee',
            'last_name' => 'Plascencia',
            'date_of_birth' => '2011-07-01',
            'klass_id' => '2',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Lennie',
            'last_name' => 'Flanagan',
            'date_of_birth' => '2011-06-01',
            'klass_id' => '2',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Francine',
            'last_name' => 'Ostrander',
            'date_of_birth' => '2011-05-01',
            'klass_id' => '2',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Jenniffer',
            'last_name' => 'McGuirk',
            'date_of_birth' => '2011-04-01',
            'klass_id' => '2',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Hannelore',
            'last_name' => 'Delorey',
            'date_of_birth' => '2011-03-01',
            'klass_id' => '2',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Chuck',
            'last_name' => 'Schechter',
            'date_of_birth' => '2011-02-15',
            'klass_id' => '2',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Estella',
            'last_name' => 'Dusenberry',
            'date_of_birth' => '2011-09-01',
            'klass_id' => '2',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Margareta',
            'last_name' => 'Hendrix',
            'date_of_birth' => '2011-10-08',
            'klass_id' => '2',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Terence',
            'last_name' => 'Orta',
            'date_of_birth' => '2011-11-01',
            'klass_id' => '2',
        ]);

        // klasse 3

        DB::table('jerd_students')->insert([
            'first_name' => 'Alexander',
            'last_name' => 'Kerg',
            'date_of_birth' => '2011-08-01',
            'klass_id' => '3',
        ]);

        DB::table('jerd_students')->insert([
            'first_name' => 'Shana',
            'last_name' => 'Kirsch',
            'date_of_birth' => '2011-07-01',
            'klass_id' => '3',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Loris',
            'last_name' => 'Frantz',
            'date_of_birth' => '2011-06-01',
            'klass_id' => '3',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Iulian',
            'last_name' => 'Gault',
            'date_of_birth' => '2011-05-01',
            'klass_id' => '3',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Matteo',
            'last_name' => 'Steichen',
            'date_of_birth' => '2011-04-01',
            'klass_id' => '3',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Noa',
            'last_name' => 'Theis',
            'date_of_birth' => '2011-03-01',
            'klass_id' => '3',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Luana',
            'last_name' => 'Thorn',
            'date_of_birth' => '2011-02-15',
            'klass_id' => '3',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Diego',
            'last_name' => 'Barthel',
            'date_of_birth' => '2011-09-01',
            'klass_id' => '3',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Gonzalo',
            'last_name' => 'Da Silva',
            'date_of_birth' => '2011-10-08',
            'klass_id' => '3',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Clayton',
            'last_name' => 'Klopp',
            'date_of_birth' => '2011-11-01',
            'klass_id' => '3',
        ]);

        // klass_id 4

        DB::table('jerd_students')->insert([
            'first_name' => 'Elisabeth',
            'last_name' => 'Schleck',
            'date_of_birth' => '2011-08-01',
            'klass_id' => '4',
        ]);

        DB::table('jerd_students')->insert([
            'first_name' => 'Ilan',
            'last_name' => 'Klein',
            'date_of_birth' => '2011-09-01',
            'klass_id' => '4',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Elisa',
            'last_name' => 'Koltz',
            'date_of_birth' => '2011-10-01',
            'klass_id' => '4',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Alex',
            'last_name' => 'Werner',
            'date_of_birth' => '2011-11-01',
            'klass_id' => '4',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Emily',
            'last_name' => 'Wagner',
            'date_of_birth' => '2011-12-01',
            'klass_id' => '4',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Bryan',
            'last_name' => 'Rabinger',
            'date_of_birth' => '2011-07-01',
            'klass_id' => '4',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Connor',
            'last_name' => 'Schaus',
            'date_of_birth' => '2011-06-01',
            'klass_id' => '4',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'Mira',
            'last_name' => 'Weis',
            'date_of_birth' => '2011-05-01',
            'klass_id' => '4',
        ]);
    }
}

