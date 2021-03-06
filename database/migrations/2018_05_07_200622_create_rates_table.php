<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('Cascade')
            ->onUpdate('Cascade');

            $table->unsignedInteger('worker_id');
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('Cascade')
            ->onUpdate('Cascade');

            $table->unique( array('customer_id','worker_id') );
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
        Schema::dropIfExists('rates');
    }
}
