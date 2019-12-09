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
            'name' => '1.1',
            'grade' => '1',
            'school_id' => '1',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '1.2',
            'grade' => '1',
            'school_id' => '1',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '2.1',
            'grade' => '2',
            'school_id' => '1',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '2.2',
            'grade' => '2',
            'school_id' => '1',
        ]);


        // school_id 2

        DB::table('jerd_klasses')->insert([
            'name' => '1.1',
            'grade' => '1',
            'school_id' => '2',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '1.2',
            'grade' => '1',
            'school_id' => '2',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '2.1',
            'grade' => '2',
            'school_id' => '2',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '2.2',
            'grade' => '2',
            'school_id' => '2',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '3.1',
            'grade' => '3',
            'school_id' => '2',
        ]);
        DB::table('jerd_klasses')->insert([
            'name' => '3.2',
            'grade' => '3',
            'school_id' => '2',
        ]);

        // school_id 3

                DB::table('jerd_klasses')->insert([
            'name' => '1.1',
            'grade' => '1',
            'school_id' => '3',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '1.2',
            'grade' => '1',
            'school_id' => '3',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '2.1',
            'grade' => '2',
            'school_id' => '3',
        ]);

        DB::table('jerd_klasses')->insert([
            'name' => '2.2',
            'grade' => '2',
            'school_id' => '3',
        ]);


    }
}
/*
