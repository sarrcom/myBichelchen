<?php

use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            'name' => 'Sanem',
            'city' => 'Sanem',
            'address' => '298 rue de tralalala'
        ]);

        DB::table('schools')->insert([
            'name' => 'Rode Wee',
            'city' => 'Balvaux',
            'address' => '12 rue de mybichelchen'
        ]);

        DB::table('schools')->insert([
            'name' => 'Post',
            'city' => 'Belvaux',
            'address' => '154 rue de kldsgnisdugiohrt'
        ]);
    }
}
