<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancerWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_works', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_details_id');
            $table->dateTime('starting_date');
            $table->dateTime('ending_date');
            $table->string('company', 255);
            $table->string('designation', 255);
            $table->string('description', 255);
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
        Schema::dropIfExists('freelancer_works');
    }
}
