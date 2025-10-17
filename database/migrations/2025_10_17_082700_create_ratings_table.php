<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi tabel ratings.
     */
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete(); // relasi ke tabel products
            $table->string('user_name'); // nama pemberi rating
            $table->tinyInteger('score'); // nilai rating (1-5)
            $table->text('comment')->nullable(); // komentar opsional
            $table->boolean('is_approved')->default(false); // status review disetujui admin atau belum
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
