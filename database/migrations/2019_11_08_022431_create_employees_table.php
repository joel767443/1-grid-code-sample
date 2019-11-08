<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_number');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('department');
            $table->string('phone_number');
            $table->date('hire_date');
            $table->integer('designation_id')->unsigned();
            $table->integer('gender_id')->unsigned();
            $table->integer('employment_type_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->softDeletes();
            $table->foreign('designation_id')->references('id')->on('designations');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('employment_type_id')->references('id')->on('employment_types');
            $table->foreign('user_id')->references('id')->on('users');

            $table->date('birth_date');
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
        Schema::dropIfExists('employees');
    }
}
