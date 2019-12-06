<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsibleOfStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jerd_responsible_of_students', function (Blueprint $table) {
            $table->integer('student_id')->unsigned();//->primary();
            $table->integer('user_id')->unsigned();//->primary();

            $table->foreign('student_id')->references('id')->on('jerd_students');
            $table->foreign('user_id')->references('id')->on('jerd_users');

            $table->primary(['student_id', 'user_id']);
            $table->index(['student_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jerd_responsible_of_students');
    }
}
