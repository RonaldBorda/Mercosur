<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DiplomaticaMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diplomaticas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('pais_a');
            $table->string('representante_a');
            $table->string('pais_b');
            $table->string('representante_b');
            $table->string('pais_c');
            $table->string('representante_c');
            $table->string('producto');
            $table->string('descripcion');
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
        Schema::dropIfExists('diplomaticas');
    }
}
