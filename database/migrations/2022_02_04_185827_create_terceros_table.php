<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTercerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terceros', function (Blueprint $table) {
            $table->id();
            $table->enum('tipoidentificacion', ['CC', 'TI', 'TP', 'RC', 'CE']);
            $table->string('numeroidentificacion')->unique();
            $table->unsignedBigInteger('idtipotercero');
            $table->string('nombre1');
            $table->string('nombre2');
            $table->string('apellido1');
            $table->string('apellido2');
            $table->unsignedBigInteger('iddepartamento');
            $table->unsignedBigInteger('idmunicipio');
            $table->foreign('idtipotercero')->references('id')->on('tipoterceros')->onDelete('cascade'); 
            $table->foreign('iddepartamento')->references('id')->on('departamentos')->onDelete('cascade'); 
            $table->foreign('idmunicipio')->references('id')->on('municipios')->onDelete('cascade');            
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
        Schema::dropIfExists('terceros');
    }
}
