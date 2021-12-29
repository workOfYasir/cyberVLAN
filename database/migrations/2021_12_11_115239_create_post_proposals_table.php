<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_proposals', function (Blueprint $table) {
            $table->id();
            $table->string('job_poster_id',255);
            $table->string('candidate_id',255);
            $table->integer('post_id');
            $table->string('job_proposal',255);
            $table->string('job_budget',100);
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
        Schema::dropIfExists('post_propsals');
    }
}
