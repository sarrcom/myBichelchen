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
        DB::table('jerd_schools')->insert([
            'name' => 'Suessem',
            'address' => '33, rue de Niederkorn',
            'zip' => 'L-4408',
            'city' => 'Sanem',
        ]);

        DB::table('jerd_schools')->insert([
            'name' => 'Belvaux-Poste',
            'address' => '2, rue de la Poste',
            'zip' => 'L-4477',
            'city' => 'Belvaux',
        ]);

        DB::table('jerd_schools')->insert([
            'name' => 'Roude Wee',
            'address' => '298, Roude Wee',
            'zip' => 'L-4608',
            'city' => 'Sanem',
        ]);

        DB::table('jerd_schools')->insert([
            'name' => 'Scheierhaff',
            'address' => '3, rue Scheuerhof',
            'zip' => 'L-4445',
            'city' => 'Soleuvre',
        ]);
    }
}
