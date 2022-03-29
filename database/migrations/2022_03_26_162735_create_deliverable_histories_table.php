<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverableHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliverable_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('proposal_id');
            $table->unsignedInteger('user_id');
            $table->string('deliverable_title');
            $table->string('deliverable_description');
            $table->integer('deliverable_duration');
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
        Schema::dropIfExists('deliverable_histories');
    }
}
