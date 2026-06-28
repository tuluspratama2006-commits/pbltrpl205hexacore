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
        Schema::table('profil_perusahaan', function (Blueprint $table) {
            // Pastikan kolom hero_image ada
            if (!Schema::hasColumn('profil_perusahaan', 'hero_image')) {
                $table->string('hero_image', 255)->nullable()->after('deskripsi');
            }
            
            // Tambah kolom untuk foto-foto tambahan jika perlu
            if (!Schema::hasColumn('profil_perusahaan', 'hero_image_2')) {
                $table->string('hero_image_2', 255)->nullable()->after('hero_image');
            }
            
            if (!Schema::hasColumn('profil_perusahaan', 'hero_title')) {
                $table->string('hero_title', 255)->nullable()->after('hero_image_2');
            }
            
            if (!Schema::hasColumn('profil_perusahaan', 'hero_subtitle')) {
                $table->string('hero_subtitle', 255)->nullable()->after('hero_title');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profil_perusahaan', function (Blueprint $table) {
            $table->dropColumn(['hero_image', 'hero_image_2', 'hero_title', 'hero_subtitle']);
        });
    }
};