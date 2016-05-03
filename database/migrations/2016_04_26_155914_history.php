<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class History extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** Create history table*/
        Schema::create('history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->mediumText('text')->nullable();
            $table->string('price');
            $table->integer('employee_id')->unsigned()->nullable();
            $table->string('record');
            $table->dateTime('reminder')->nullable();
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
        Schema::drop('history');
    }
}
