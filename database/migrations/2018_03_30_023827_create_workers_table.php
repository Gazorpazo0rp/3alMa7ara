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
            $table->unsignedInteger('worker_id')->primary();
            $table->foreign('worker_id')->references('id')->on('users')->onDelete('cascade')
            ->onUpdate('cascade');

            $table->string('Location');
            $table->mediumText('Bio');
            $table->unsignedInteger('DailyCost');
            $table->string('DueTo');
            $table->string('State');
            $table->string('Image');
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
