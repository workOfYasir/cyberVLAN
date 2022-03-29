<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostDeliverablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_deliverables', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('post_id');
            $table->string('deliverable_title');
            $table->string('deliverable_description');
            $table->integer('deliverable_duration');
            $table->string('action');
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
        Schema::dropIfExists('post_deliverables');
    }
}
