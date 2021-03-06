<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Classes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('status')->default('program');
            $table->dateTime('date');
            $table->string('level')->default('facile');
            $table->string('place_available_nbr')->default(0);
            $table->string('room_nbr');
            $table->string('address');
            $table->uuid('matter_id');
            $table->uuid('teacher_id');
            $table->timestamps();
        });
        Schema::create('matters', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('libel')->unique();
            $table->timestamps();
        });
        Schema::create('classes_participants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('classe_id');
            $table->uuid('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
        Schema::dropIfExists('matters');
        Schema::dropIfExists('classe_participant');
    }
}
