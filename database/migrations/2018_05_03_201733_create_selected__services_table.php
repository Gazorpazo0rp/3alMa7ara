<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSelectedServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selected_services', function (Blueprint $table) {
            $table->unsignedInteger('form_id');
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('Cascade')
            ->onUpdate('Cascade');

            $table->unsignedInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('Cascade')
            ->onUpdate('Cascade');

            $table->unsignedInteger('price_id');
            $table->foreign('price_id')->references('id')->on('prices')->onDelete('Cascade')
            ->onUpdate('Cascade');

            $table->unique( array('form_id','service_id','price_id') );
            $table->string('note')->nullable();
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
        Schema::dropIfExists('selected__services');
    }
}
