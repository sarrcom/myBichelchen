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
        DB::table('jerd_students')->insert([
            'first_name' => 'student1',
            'last_name' => 'default',
            'date_of_birth' => '2014-08-01',
            'klass_id' => '1',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'student2',
            'last_name' => 'default',
            'date_of_birth' => '2014-08-01',
            'klass_id' => '1',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'student3',
            'last_name' => 'default',
            'date_of_birth' => '2014-08-01',
            'klass_id' => '1',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'student4',
            'last_name' => 'default',
            'date_of_birth' => '2014-08-01',
            'klass_id' => '1',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'student5',
            'last_name' => 'default',
            'date_of_birth' => '2014-08-01',
            'klass_id' => '2',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'student6',
            'last_name' => 'default',
            'date_of_birth' => '2014-08-01',
            'klass_id' => '2',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'student7',
            'last_name' => 'default',
            'date_of_birth' => '2014-08-01',
            'klass_id' => '2',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'student8',
            'last_name' => 'default',
            'date_of_birth' => '2014-08-01',
            'klass_id' => '2',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'student9',
            'last_name' => 'default',
            'date_of_birth' => '2014-08-01',
            'klass_id' => '3',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'student10',
            'last_name' => 'default',
            'date_of_birth' => '2014-08-01',
            'klass_id' => '3',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'student11',
            'last_name' => 'default',
            'date_of_birth' => '2014-08-01',
            'klass_id' => '3',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'student12',
            'last_name' => 'default',
            'date_of_birth' => '2014-08-01',
            'klass_id' => '3',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'student13',
            'last_name' => 'default',
            'date_of_birth' => '2014-08-01',
            'klass_id' => '4',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'student14',
            'last_name' => 'default',
            'date_of_birth' => '2014-08-01',
            'klass_id' => '4',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'student15',
            'last_name' => 'default',
            'date_of_birth' => '2014-08-01',
            'klass_id' => '4',
        ]);
        DB::table('jerd_students')->insert([
            'first_name' => 'student16',
            'last_name' => 'default',
            'date_of_birth' => '2014-08-01',
            'klass_id' => '4',
        ]);
    }
}

