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
            $table->integer('emp_id');
            $table->string('emp_name');
            $table->string('emp_profile');
            $table->integer('emp_ext');
            $table->string('emp_designation');
            $table->string('emp_department');
            $table->string('emp_group');
            $table->string('emp_mobile');
            $table->string('emp_email');
            $table->string('emp_address');
            $table->integer('emp_machine');
            $table->string('emp_img_ext');
            $table->string('emp_delete');
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
