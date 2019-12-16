<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jerd_students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 190);
            $table->string('last_name', 190);
            $table->date('date_of_birth')->nullable();
            $table->integer('klass_id')->unsigned();

            $table->foreign('klass_id')->references('id')->on('jerd_klasses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jerd_students');
    }
}
