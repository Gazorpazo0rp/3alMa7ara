<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('Cascade')
            ->onUpdate('Cascade');

            $table->string('Location');
            $table->string('State')->default('Tob A7mar');
            $table->unsignedInteger('Area')->default('150');
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
        Schema::dropIfExists('apartments');
    }
}
