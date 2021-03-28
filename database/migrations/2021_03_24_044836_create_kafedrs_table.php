<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKafedrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kafedrs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_faculty');
            $table->string('name', '100');
            $table->string('fio_manage','50');
            $table->string('room', '20');
            $table->string('phone','20');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kafedrs');
    }
}
