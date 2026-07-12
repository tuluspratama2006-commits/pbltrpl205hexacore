<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_perusahaan', function (Blueprint $table) {
            $table->string('dokumen_pdf')
                  ->nullable()
                  ->after('nomor_sertifikasi');
        });
    }

    public function down(): void
    {
        Schema::table('profil_perusahaan', function (Blueprint $table) {
            $table->dropColumn('dokumen_pdf');
        });
    }
};