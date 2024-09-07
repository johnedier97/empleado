<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleado_rol', function (Blueprint $table) {
            $table->integer('id',11)->primary()->comment('Identificador del empleado');
            $table->Integer('rol_id',)->length('11')->nullable(false)->comment('Identificador del rol');
            $table->foreign('rol_id')
                  ->references('id')
                  ->on('roles')
                  ->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
