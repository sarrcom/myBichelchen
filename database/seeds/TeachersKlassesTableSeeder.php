<?php

use Illuminate\Database\Seeder;

class TeachersKlassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jerd_teachers_klasses')->insert([
            'klass_id' => 3,
            'user_id' => 1,
        ]);
        DB::table('jerd_teachers_klasses')->insert([
            'klass_id' => 4,
            'user_id' => 1,
        ]);
        DB::table('jerd_teachers_klasses')->insert([
            'klass_id' => 7,
            'user_id' => 1,
        ]);
        DB::table('jerd_teachers_klasses')->insert([
            'klass_id' => 8,
            'user_id' => 2,
        ]);
        DB::table('jerd_teachers_klasses')->insert([
            'klass_id' => 1,
            'user_id' => 2,
        ]);
        DB::table('jerd_teachers_klasses')->insert([
            'klass_id' => 2,
            'user_id' => 2,
        ]);

        DB::table('jerd_teachers_klasses')->insert([
            'klass_id' => 4,
            'user_id' => 2,
        ]);

    }
}
