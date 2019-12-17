<?php

use Illuminate\Database\Seeder;

class KlassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // school_id 1

        DB::table('jerd_klasses')->insert([
            'name' => '1.1 Suessem',
            'grade' => '1',
            'school_id' => '1',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '1.2 Suessem',
            'grade' => '1',
            'school_id' => '1',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '2.1 Suessem',
            'grade' => '2',
            'school_id' => '1',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '2.2 Suessem',
            'grade' => '2',
            'school_id' => '1',
        ]);

                DB::table('jerd_klasses')->insert([
            'name' => '3.1 Suessem',
            'grade' => '3',
            'school_id' => '1',
        ]);
        DB::table('jerd_klasses')->insert([
            'name' => '3.2 Suessem',
            'grade' => '3',
            'school_id' => '1',
        ]);


        // school_id 2

        DB::table('jerd_klasses')->insert([
            'name' => '1.1 Belvaux-Poste',
            'grade' => '1',
            'school_id' => '2',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '1.2 Belvaux-Poste',
            'grade' => '1',
            'school_id' => '2',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '2.1 Belvaux-Poste',
            'grade' => '2',
            'school_id' => '2',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '2.2 Belvaux-Poste',
            'grade' => '2',
            'school_id' => '2',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '3.1 Belvaux-Poste',
            'grade' => '3',
            'school_id' => '2',
        ]);
        DB::table('jerd_klasses')->insert([
            'name' => '3.2 Belvaux-Poste',
            'grade' => '3',
            'school_id' => '2',
        ]);

        // school_id 3

                DB::table('jerd_klasses')->insert([
            'name' => '1.1 Roude Wee',
            'grade' => '1',
            'school_id' => '3',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '1.2 Roude Wee',
            'grade' => '1',
            'school_id' => '3',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '2.1 Roude Wee',
            'grade' => '2',
            'school_id' => '3',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '2.2 Roude Wee',
            'grade' => '2',
            'school_id' => '3',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '3.1 Roude Wee',
            'grade' => '3',
            'school_id' => '3',
        ]);
        DB::table('jerd_klasses')->insert([
            'name' => '3.2 Roude Wee',
            'grade' => '3',
            'school_id' => '3',
        ]);


        // school_id 4

        DB::table('jerd_klasses')->insert([
            'name' => '1.1 Scheierhaff',
            'grade' => '1',
            'school_id' => '4',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '1.2 Scheierhaff',
            'grade' => '1',
            'school_id' => '4',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '2.1 Scheierhaff',
            'grade' => '2',
            'school_id' => '4',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '2.2 Scheierhaff',
            'grade' => '2',
            'school_id' => '4',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '3.1 Scheierhaff',
            'grade' => '3',
            'school_id' => '4',
        ]);
        DB::table('jerd_klasses')->insert([
            'name' => '3.2 Scheierhaff',
            'grade' => '3',
            'school_id' => '4',
        ]);

    }
}

