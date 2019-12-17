<?php

use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // type is an enum('Homework', 'Absence', 'Note')

        DB::table('jerd_notifications')->insert([
            'description' => 'Getting jiggy with it',
            'subject' => 'To All Students of Klass 1',
            'date' => '2019-12-17',
            'type'  => 'Homework',
            'klass_id' => 3,
            // 'student_id' => 21,
            'user_id' => 1,
        ]);

        DB::table('jerd_notifications')->insert([
            'description' => 'Getting jiggy with it',
            'subject' => 'To Student 1 of Klass 1',
            'date' => '2019-12-17',
            'type'  => 'Homework',
            'klass_id' => 4,
            // 'student_id' => 31,
            'user_id' => 2,
        ]);

        DB::table('jerd_notifications')->insert([
            'description' => 'Alexander sera absent demain',
            'subject' => 'Absence demain',
            'date' => '2019-12-13',
            'type'  => 'Absence',
            // 'klass_id' => 3,
            'student_id' => '21',
            'user_id' => '5',
        ]);
        DB::table('jerd_notifications')->insert([
            'description' => 'she should drink more milk',
            'subject' => '99 bottles of milk',
            'date' => '2019-12-12',
            'type'  => 'Note',
            // 'klass_id' => 3,
            'student_id' => 31,
            'user_id' => 1,
        ]);
    }
}
