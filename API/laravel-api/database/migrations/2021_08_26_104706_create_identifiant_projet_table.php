<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentifiantProjetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identifiant_projets', function (Blueprint $table) {
            $table->integer('identifiant_id')->unsigned();
            $table->integer('projet_id')->unsigned();

            $table->foreign('identifiant_id')->references('id')->on('identifiants')
                ->onDelete('cascade');
            $table->foreign('projet_id')->references('id')->on('projets')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('identifiant_projets');
    }
}
