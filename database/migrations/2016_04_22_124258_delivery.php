<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Delivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** Create delivery table*/
        Schema::create('delivery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transport_company_id')->unsigned();
            $table->string('department')->nullable();
            $table->string('address')->nullable();
            $table->string('payment')->nullable();
            $table->string('from')->nullable();
            $table->integer('employee_id')->unsigned()->nullable();
            $table->integer('building_object_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('employee_id')
              ->references('id')
              ->on('employee')
              ->onUpdate('cascade');
            $table->foreign('transport_company_id')
              ->references('id')
              ->on('transport_company')
              ->onUpdate('cascade');
            $table->foreign('building_object_id')
              ->references('id')
              ->on('building_object')
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
        Schema::drop('delivery');
    }
}
