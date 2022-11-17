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
        {
            Schema::create('user', function (Blueprint $table) {
                $table->engine = 'innodb';
                $table->char('id_user', 5)->primary();
                $table->string('nama', 60);
                $table->string('username')->unique();
                $table->text('password');
                $table->text('foto')->nullable();
                $table->char('level', 3);

                $table->timestamps();

                // foreign
                $table
                    ->foreign('level')
                    ->references('id_level')
                    ->on('level_user')
                    ->cascadeOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('user');
    }
};
