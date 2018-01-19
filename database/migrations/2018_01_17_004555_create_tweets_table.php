<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('tweet_id')->unique();
            $table->string('user_name', 100);
            $table->string('user_link');
            $table->string('user_icon');
            $table->text('text');
            $table->string('link');
            $table->string('latitude');
            $table->string('longitude');
            $table->text('serialized_data');
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
        Schema::dropIfExists('tweets');
    }
}
