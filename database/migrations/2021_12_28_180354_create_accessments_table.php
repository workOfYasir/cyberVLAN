<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessments', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->string('option_1',255);
            $table->string('option_2',255);
            $table->string('option_3',255);
            $table->string('option_4',255);
            $table->string('awnser',255)->nullable();
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
        Schema::dropIfExists('accessments');
    }
}
