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
        Schema::create('admin_activities', function (Blueprint $table) {
            $table->id();

            // ID admin dari tabel `admin`
            $table->unsignedBigInteger('admin_id')->nullable()->index();
            $table->string('admin_name', 100)->nullable();

            $table->string('aksi', 100);
            $table->string('target', 255)->nullable();

            // Status baca notifikasi
            $table->boolean('is_read')->default(false)->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_activities');
    }
};
