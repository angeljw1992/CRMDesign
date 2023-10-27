<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToClientesTable extends Migration
{
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->unsignedBigInteger('materia_id')->nullable();
            $table->foreign('materia_id', 'materia_fk_9125647')->references('id')->on('clases');
            $table->unsignedBigInteger('horario_id')->nullable();
            $table->foreign('horario_id', 'horario_fk_9125648')->references('id')->on('horarios');
        });
    }
}
