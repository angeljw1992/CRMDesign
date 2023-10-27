<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAsistenciaTable extends Migration
{
    public function up()
    {
        Schema::table('asistencia', function (Blueprint $table) {
            $table->unsignedBigInteger('estudiante_id')->nullable();
            $table->foreign('estudiante_id', 'estudiante_fk_9125296')->references('id')->on('clientes');
            $table->unsignedBigInteger('materia_id')->nullable();
            $table->foreign('materia_id', 'materia_fk_9138703')->references('id')->on('clases');
            $table->unsignedBigInteger('horario_id')->nullable();
            $table->foreign('horario_id', 'horario_fk_9138704')->references('id')->on('horarios');
            $table->unsignedBigInteger('clase_reposicion_id')->nullable();
            $table->foreign('clase_reposicion_id', 'clase_reposicion_fk_9148957')->references('id')->on('clases');
            $table->unsignedBigInteger('horario_reposicion_id')->nullable();
            $table->foreign('horario_reposicion_id', 'horario_reposicion_fk_9148958')->references('id')->on('horarios');
        });
    }
}
