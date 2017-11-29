<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigManysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_manys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('index');
            $table->text('value');
            $table->tinyInteger('status');
            $table->string('description');
            $table->timestamps();
            $table->unique(['name', 'index']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_manys');
    }
}
