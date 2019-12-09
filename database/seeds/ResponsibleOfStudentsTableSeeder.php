<?php

use Illuminate\Database\Seeder;

class ResponsibleOfStudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jerd_responsible_of_studnets')->insert([
            'name' => 'Sanem',
            'city' => 'Sanem',
            'address' => '298 rue de tralalala'
        ]);
    }
}
