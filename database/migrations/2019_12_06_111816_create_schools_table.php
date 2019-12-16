<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jerd_schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            // $table->string('address', 250)->unique();
            $table->string('address', 150)->unique();
            $table->string('zip', 50);
            $table->string('city', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
