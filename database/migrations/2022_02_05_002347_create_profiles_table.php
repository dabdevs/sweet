<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('locations');
            $table->text('bio')->nullable();
            $table->string('telephone')->nullable();
            $table->boolean('whatsapp')->default(0);
            $table->boolean('is_verified')->default(0);
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->string('height')->nullable();
            $table->string('eyes_color')->nullable();
            $table->float('price')->nullable();
            $table->string('avatar')->nullable()->default('default.jpg');
            $table->string('horario')->nullable();
            $table->boolean('on_vacation')->default(0);
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
        Schema::dropIfExists('profiles');
    }
}
