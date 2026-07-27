<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_perusahaan', function (Blueprint $table) {
            $table->string('manual_book_pdf')
                  ->nullable()
                  ->after('dokumen_pdf');
        });
    }

    public function down(): void
    {
        Schema::table('profil_perusahaan', function (Blueprint $table) {
            $table->dropColumn('manual_book_pdf');
        });
    }
};