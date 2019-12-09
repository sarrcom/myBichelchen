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
        DB::table('jerd_responsible_of_students')->insert([
            'student_id' => 1,
            'user_id' => 1,
        ]);
    }
}
