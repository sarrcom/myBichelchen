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
        DB::table('jerd_klasses')->insert([
            'name' => '1.1',
            'year' => '1',
            'school_id' => '1',
        ]);
    
        DB::table('jerd_klasses')->insert([
            'name' => '2.1',
            'year' => '2',
            'school_id' => '1',
        ]);
    
        DB::table('jerd_klasses')->insert([
            'name' => '4.2',
            'year' => '4',
            'school_id' => '2',
        ]);
        DB::table('jerd_klasses')->insert([
            'name' => '6.1',
            'year' => '6',
            'school_id' => '3',
        ]);
    }
}
/*
