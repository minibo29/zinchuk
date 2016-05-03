<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Departement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** Create departement table*/
        Schema::create('departement', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
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
        Schema::drop('departement');
    }
}
