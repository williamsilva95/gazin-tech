<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesenvolvedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desenvolvedores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('sexo');
            $table->string('data_nascimento');
            $table->integer('idade');
            $table->string('hobby');
            $table->integer('total_visualizacao')->default(0);

            $table->foreignId('nivel_id')->constrained('niveis');
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
        Schema::dropIfExists('desenvolvedores');
    }
}
