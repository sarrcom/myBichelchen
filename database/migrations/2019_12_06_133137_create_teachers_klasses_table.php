<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersKlassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jerd_teachers_klasses', function (Blueprint $table) {
            $table->integer('klass_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('klass_id')->references('id')->on('jerd_klasses');
            $table->foreign('user_id')->references('id')->on('jerd_users');

            $table->primary(['klass_id', 'user_id']);
            $table->index(['klass_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jerd_teachers_klasses');
    }
}
