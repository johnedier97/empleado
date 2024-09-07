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
        Schema::create('empleados', function (Blueprint $table) {
            $table->integer('id',11)->primary()->comment('Identificador del empleado');
            $table->string('nombre',255)->nullable(false)->comment('Nombre completo del empleado. Campo tipo Text. Solo debe permitir letras con o
            sin tilde y espacios. No se admiten caracteres especiales ni numeros.Obligatorio');
            $table->string('email',255)->nullable(false)->comment('Correo electronico del empleado. Campo tipo Text|Email. Solo debe permitir una estructura de correo. Obligatorio');
            $table->char('sexo',1)->nullable(false)->comment('Campo de tipo Radio Button. M para masculino. F para Femenino. Obligatorio.');
            $table->integer('boletin')->lenght('10')->nullable(true)->comment('1 para Recibir boletín. 0 para no recibir boletín. Campo de tipo Checkbox');
            $table->text('descripcion')->nullable(false)->comment('Se describe la experiencia del empleado. Campo de tipo textarea. Obligatorio.');
            $table->integer('area_id')->length('11')->nullable('true')->comment('Area de la empresa a la que pertenece el empleado. Campo de tipo checkbox. Opcional');
            $table->foreign('area_id')
                  ->references('id')
                  ->on('areas')
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
