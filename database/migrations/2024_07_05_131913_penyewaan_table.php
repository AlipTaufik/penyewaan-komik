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
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->id();
            $table->double('nomor_sewa',20)->unique();
            $table->string('customer');
            $table->integer('telepon');
            $table->string('alamat');
            $table->double('total_penyewaan');
            $table->enum('status_penyewaan',['DISEWA','DIKEMBALIKAN']);
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
