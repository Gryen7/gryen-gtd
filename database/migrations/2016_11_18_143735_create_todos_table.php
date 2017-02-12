<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parents_id')->unsigned();
            $table->integer('grandparents_id')->unsigned();
            $table->string('content');
            $table->tinyInteger('status');
            $table->tinyInteger('importance');
            $table->timestamp('begin_at');
            $table->timestamp('end_at');
            $table->softDeletes();
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
        Schema::drop('todos');
    }
}
