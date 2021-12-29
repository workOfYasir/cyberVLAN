<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->foreignUuid('user_id');
            $table->text('user_cover');
            $table->text('user_profile');
            $table->string('user_dob', 255)->nullable(true);
            $table->char('user_gender', 10)->nullable(true);
            $table->string('user_mobile', 255)->nullable(true);
            $table->string('user_phone', 255)->nullable(true);
            $table->string('user_address_country', 255)->nullable(true);
            $table->string('user_address_city', 255)->nullable(true);
            $table->string('user_address_zip', 255)->nullable(true);
            $table->text('user_address')->nullable(true);
            $table->string('user_website')->nullable(true)->default('#');
            $table->string('user_github')->nullable(true)->default('#');
            $table->string('user_linkedin')->nullable(true)->default('#');
            $table->string('user_facebook')->nullable(true)->default('#');
            $table->string('user_insta')->nullable(true)->default('#');
            $table->string('user_twitter')->nullable(true)->default('#');
            $table->string('user_account_title', 255)->nullable(true);
            $table->string('user_account_bank', 255)->nullable(true);
            $table->string('user_account_iban', 255)->nullable(true);
            $table->text('description')->nullable(true);
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
        Schema::dropIfExists('user_details');
    }
}
