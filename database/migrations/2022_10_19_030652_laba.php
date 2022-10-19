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
        //
        Schema::create('laba', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->string('id_laba')->primary();
            $table->date('tanggal')->default(now());
            $table->integer('total_rugi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('laba');
    }
};
