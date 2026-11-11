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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('kode_tiket')->unique();
            $table->date('tanggal_kunjungan');
            $table->integer('jumlah_pengunjung');
            $table->decimal('total_harga', 12, 2)->default(0);
            $table->string('status_pembayaran')->default('menunggu');
            $table->string('status_kunjungan')->default('belum_dikunjungi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
