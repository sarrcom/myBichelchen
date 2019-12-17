<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jerd_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 190);
            $table->string('last_name', 190);
            $table->date('date_of_birth')->nullable();
            $table->string('username', 190)->unique();
            $table->string('password', 190);
            $table->enum('role', ['Teacher', 'Guardian', 'MaRe']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jerd_users');
    }
}
