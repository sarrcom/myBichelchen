<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jerd_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 190);
            $table->string('password', 190);
            $table->integer('school_id')->unsigned()->nullable();

            $table->foreign('school_id')->references('id')->on('jerd_schools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jerd_admins');
    }
}
