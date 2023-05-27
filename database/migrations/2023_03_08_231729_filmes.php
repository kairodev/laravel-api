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
        Schema::create('filmes', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->year('ano')->nullable();
        });

        DB::table('filmes')->upsert(
            [
                ['nome' => 'Pânico 5', 'ano' => 2022],
                ['nome' => 'Gato de Botas 2: O Último Pedido', 'ano' => 2022],
                ['nome' => 'Trem-Bala (Bullet Train)', 'ano' => 2022],
                ['nome' => 'As Trambiqueiras', 'ano' => 2021],
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
        Schema::dropIfExists('filmes');
    }
};
