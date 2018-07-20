<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServicesWorkersColumnsToForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('forms' , function($table){
            $table->string('services',5000)->nullable();
            $table->string('workers',5000)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('forms' , function($table){
            $table->dropColumn('services');
            $table->dropColumn('workers');
        });
    }
}
