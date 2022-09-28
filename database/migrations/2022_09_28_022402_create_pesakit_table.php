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
        Schema::create('pesakit', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pesakit');
            $table->string('no_kp');
            $table->date('tarikh_lahir')->nullable();
            $table->string('jantina', 100);
            $table->text('alamat')->nullable();
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesakit');
    }
};
