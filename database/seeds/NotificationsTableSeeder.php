<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'description' => 'Tomorrow test German',
            'subject' => 'To All Students of Klass 1',
            'date' => '2019-12-17',
            'type'  => 'Homework',
            'klass_id' => 3,
            // 'student_id' => 21,
            'user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('jerd_notifications')->insert([
            'description' => 'Friday bring toys',
            'subject' => 'To Student 1 of Klass 1',
            'date' => '2019-12-17',
            'type'  => 'Homework',
            'klass_id' => null,
            'student_id' => 1,
            'user_id' => 2,
        ]);

        DB::table('jerd_notifications')->insert([
            'description' => 'Getting jiggy with it',
            'subject' => 'To Student 2 of Klass 1',
            'date' => '2019-12-17',
            'type'  => 'Homework',
            'klass_id' => null,
            'student_id' => 2,
            'user_id' => 2,
        ]);
        DB::table('jerd_notifications')->insert([
            'description' => 'Getting jiggy with it',
            'subject' => 'To Student 3 of Klass 1',
            'date' => '2019-12-17',
            'type'  => 'Homework',
            'klass_id' => null,
            'student_id' => 3,
            'user_id' => 2,
        ]);
        DB::table('jerd_notifications')->insert([
            'description' => 'Getting jiggy with it',
            'subject' => 'To Student 4 of Klass 1',
            'date' => '2019-12-17',
            'type'  => 'Homework',
            'klass_id' => null,
            'student_id' => 4,
            'user_id' => 2,
        ]);
        DB::table('jerd_notifications')->insert([
            'description' => 'Getting jiggy with it',
            'subject' => 'To Student 5 of Klass 1',
            'date' => '2019-12-17',
            'type'  => 'Homework',
            'klass_id' => null,
            'student_id' => 5,
            'user_id' => 2,
        ]);
        DB::table('jerd_notifications')->insert([
            'description' => 'Getting jiggy with it',
            'subject' => 'To Student 6 of Klass 1',
            'date' => '2019-12-17',
            'type'  => 'Homework',
            'klass_id' => null,
            'student_id' => 6,
            'user_id' => 2,
        ]);
        DB::table('jerd_notifications')->insert([
            'description' => 'Getting jiggy with it',
            'subject' => 'To Student 7 of Klass 1',
            'date' => '2019-12-17',
            'type'  => 'Homework',
            'klass_id' => null,
            'student_id' => 7,
            'user_id' => 2,
        ]);
        DB::table('jerd_notifications')->insert([
            'description' => 'Getting jiggy with it',
            'subject' => 'To Student 8 of Klass 1',
            'date' => '2019-12-17',
            'type'  => 'Homework',
            'klass_id' => null,
            'student_id' => 8,
            'user_id' => 2,
        ]);
        DB::table('jerd_notifications')->insert([
            'description' => 'Getting jiggy with it',
            'subject' => 'To Student 9 of Klass 1',
            'date' => '2019-12-17',
            'type'  => 'Homework',
            'klass_id' => null,
            'student_id' => 9,
            'user_id' => 2,
        ]);
        DB::table('jerd_notifications')->insert([
            'description' => 'Getting jiggy with it',
            'subject' => 'To Student 10 of Klass 1',
            'date' => '2019-12-17',
            'type'  => 'Homework',
            'klass_id' => null,
            'student_id' => 10,
            'user_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('jerd_notifications')->insert([
            'description' => 'Alexander sera absent demain',
            'subject' => 'Absence demain',
            'date' => '2019-12-13',
            'type'  => 'Absence',
            // 'klass_id' => 3,
            'student_id' => '21',
            'user_id' => '5',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('jerd_notifications')->insert([
            'description' => 'she should drink more milk',
            'subject' => '99 bottles of milk',
            'date' => '2019-12-12',
            'type'  => 'Note',
            // 'klass_id' => 3,
            'student_id' => 31,
            'user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
