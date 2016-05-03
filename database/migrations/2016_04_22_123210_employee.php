<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Employee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** Create employee table*/
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('position')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('birthday')->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();
            $table->foreign('company_id')
              ->references('id')
              ->on('company')
              ->onDelete('cascade');
        });

        Schema::table('company', function (Blueprint $table) {
            $table->foreign('employee_id')
              ->references('id')
              ->on('employee')
              ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employee');
    }
}
