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
            $table->string('firstname', 150)->nullable();
            $table->string('lastname', 150)->nullable();
            $table->enum('gender', ['Male', 'Female', 'Trans', 'Other'])->nullable();
            $table->date('birthdate')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('locations');
            $table->string('headline')->nullable();
            $table->text('bio')->nullable();
            $table->float('fee')->nullable();
            $table->string('cbu')->nullable();
            $table->string('alias')->nullable();
            $table->string('telephone')->nullable();
            $table->boolean('whatsapp')->default(0);
            $table->string('professional_email')->nullable();
            $table->string('website')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('featured_video')->nullable();
            $table->boolean('on_vacation')->default(0);
            $table->boolean('is_verified')->default(0);
            $table->boolean('can_travel')->default(0);
            $table->unsignedBigInteger('file_id')->nullable();
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade')->nullable();
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
