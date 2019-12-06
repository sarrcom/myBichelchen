<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jerd_teachers_classes', function (Blueprint $table) {
            $table->integer('class_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('class_id')->references('id')->on('jerd_classes');
            $table->foreign('user_id')->references('id')->on('jerd_users');

            $table->primary(['class_id', 'user_id']);
            $table->index(['class_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jerd_teachers_classes');
    }
}
