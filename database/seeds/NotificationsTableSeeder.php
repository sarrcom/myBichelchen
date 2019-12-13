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
            'description' => 'Mathé Seite 8 bis 9',
            'subject' => 'M: S8-9',
            'date' => '2019-12-12',
            'type'  => 'Homework',
            'klass_id' => 3,
            'student_id' => 21,
            'user_id' => 1,
        ]);

        DB::table('jerd_notifications')->insert([
            'description' => 'Allemand: Seite 6 bis 17',
            'subject' => 'AL: S6-17',
            'date' => '2019-12-12',
            'type'  => 'Homework',
            'klass_id' => 4,
            'student_id' => 31,
            'user_id' => 2,
        ]);

        DB::table('jerd_notifications')->insert([
            'description' => 'Alexander sera absent demain',
            'subject' => 'Absence demain',
            'date' => '2019-12-13',
            'type'  => 'Absence',
            'klass_id' => 3,
            'student_id' => '21',
            'user_id' => '5',
        ]);

        DB::table('jerd_notifications')->insert([
            'description' => '99 bottles of milk is a slightly more involved example than "Hello world", so it can show the things that differentiate one language from the others.',
            'subject' => '99 bottles of milk',
            'date' => '2019-12-12',
            'type'  => 'Note',
            'klass_id' => 3,
            'student_id' => 21,
            'user_id' => 1,
        ]);
    }
}
