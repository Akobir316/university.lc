<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('day_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('lesson_id')->nullable();
            $table->integer('discipline_id')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('less_type_id')->nullable();
            $table->integer('classroom_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_tables');
    }
}
