<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jerd_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('subject');
            $table->date('date');
            $table->enum('type', ['Homework', 'Absence', 'Note']);
            $table->boolean('checked')->nullable();
            $table->integer('klass_id')->unsigned()->nullable();
            $table->integer('student_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('klass_id')->references('id')->on('jerd_klasses');
            $table->foreign('student_id')->references('id')->on('jerd_students');
            $table->foreign('user_id')->references('id')->on('jerd_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jerd_notifications');
    }
}
