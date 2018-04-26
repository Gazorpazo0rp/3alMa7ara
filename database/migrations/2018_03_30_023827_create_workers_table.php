<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('age');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->mediumText('bio');
            $table->unsignedInteger('rate')->default('0');
            $table->string('video');  // Video folder path
            $table->string('dueto');
            $table->string('status')->default('Available'); //Worker available or Not
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
    }
}
