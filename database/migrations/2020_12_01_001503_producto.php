<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Producto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('descripcion', 100);
            $table->string('foto');
            $table->integer('precio');
            $table->integer('existencias');
            $table->string('departamento');
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
        //Schema::dropIfExists('productos');
        Schema::table('productos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
