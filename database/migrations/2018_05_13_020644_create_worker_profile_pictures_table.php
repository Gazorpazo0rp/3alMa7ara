<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkerProfilePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_profile_pictures', function (Blueprint $table) {
            $table->unsignedInteger('worker_id');
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('Cascade')
            ->onUpdate('Cascade');
            $table->string('imagepath');

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
        Schema::dropIfExists('worker_profile_pictures');
    }
}
