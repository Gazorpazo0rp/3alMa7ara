<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkerRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('profession');
            $table->string('email')->unique();
            $table->string('phone');
            $table->unsignedInteger('age');
            $table->string('address');
            $table->mediumText('bio');
            $table->string('filepath')->nullable();
            // Gallery & Video
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
        Schema::dropIfExists('worker_requests');
    }
}
