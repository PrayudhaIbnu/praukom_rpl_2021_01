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
                $table->engine = env('DB_STORAGE_ENGINE', 'InnoDB');
                $table->charset = env('DB_CHARSET', 'utf8mb4');
                $table->collation = env('DB_COLLATION', 'utf8mb4_general_ci');
                $table->integer('id', true);
                $table->char('id_user', 5)->unique();
                $table->string('nama', 60);
                $table->string('username', 225)->unique();
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
