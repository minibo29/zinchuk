<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuildingObject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** Create building object table*/
        Schema::create('building_object', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->integer('employee_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('employee_id')
              ->references('id')
              ->on('employee')
              ->onUpdate('cascade');
            $table->foreign('company_id')
              ->references('id')
              ->on('company')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('building_object');
    }
}
