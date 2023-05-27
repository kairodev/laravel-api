<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->id();
            $table->string('modelo')->nullable();
            $table->string('marca')->nullable();
            $table->year('ano_modelo')->nullable();
        });

        DB::table('carros')->upsert(
            [
                ['modelo' => 'AMAROK CD2.0 16V/S CD2.0 16V TDI 4x2 Die', 'marca' => 'Volkswagen', 'ano_modelo' => 2013],
                ['modelo' => 'EcoSport FREESTYLE 1.5 12V Flex 5p Aut', 'marca' => 'Ford', 'ano_modelo' => 2021],
                ['modelo' => 'AZERA 3.0 V6 24V 4p Aut', 'marca' => 'Hyundai', 'ano_modelo' => 2020],
                ['modelo' => 'Corolla Cross GR-S 2.0 16V Flex Aut', 'marca' => 'Toyota', 'ano_modelo' => 2023],
            ],
            'id'
        );


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carros');
    }
};
