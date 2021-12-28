<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuses', function (Blueprint $table) {
            $table->id();
            $table->string('no_polisi');
            $table->string('model');
            $table->string('no_chassis');
            $table->string('nama_customer');
            $table->string('no_telp');
            $table->text('alamat');
            $table->text('catatan');
            $table->boolean('is_ajukan');       
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
        Schema::dropIfExists('fuses');
    }
}
