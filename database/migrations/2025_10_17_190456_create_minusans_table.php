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
        Schema::create('minusans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('server');
            $table->string('nama');
            $table->string('spl');
            $table->string('produk');
            $table->string('nomor');
            $table->decimal('total');
            $table->integer('qty');
            $table->decimal('total_per_org');
            $table->text('keterangan');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('minusans');
    }
};
