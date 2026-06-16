<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_perusahaan', function (Blueprint $table) {
            if (!Schema::hasColumn('profil_perusahaan', 'alamat_2')) {
                $table->string('alamat_2')->nullable();
            }

            if (!Schema::hasColumn('profil_perusahaan', 'maps_embed')) {
                $table->text('maps_embed')->nullable();
            }

            if (!Schema::hasColumn('profil_perusahaan', 'maps_embed_2')) {
                $table->text('maps_embed_2')->nullable();
            }
            if (!Schema::hasColumn('profil_perusahaan', 'instagram')) {
                $table->string('instagram', 255)->nullable();
            }
            if (!Schema::hasColumn('profil_perusahaan', 'facebook')) {
                $table->string('facebook', 255)->nullable();
            }
            if (!Schema::hasColumn('profil_perusahaan', 'linkedin')) {
                $table->string('linkedin', 255)->nullable();
            }
            if (!Schema::hasColumn('profil_perusahaan', 'telepon_2')) {
                $table->string('telepon_2', 30)->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('profil_perusahaan', function (Blueprint $table) {
        // Kita cek satu-persatu, jika kolomnya ada baru kita Hapus (Drop)
        if (Schema::hasColumn('profil_perusahaan', 'alamat_2')) {
            $table->dropColumn('alamat_2');
        }
        if (Schema::hasColumn('profil_perusahaan', 'maps_embed')) {
            $table->dropColumn('maps_embed');
        }
        if (Schema::hasColumn('profil_perusahaan', 'maps_embed_2')) {
            $table->dropColumn('maps_embed_2');
        }
        if (Schema::hasColumn('profil_perusahaan', 'instagram')) {
            $table->dropColumn('instagram');
        }
        if (Schema::hasColumn('profil_perusahaan', 'facebook')) {
            $table->dropColumn('facebook');
        }
        if (Schema::hasColumn('profil_perusahaan', 'linkedin')) {
            $table->dropColumn('linkedin');
        }
        if (Schema::hasColumn('profil_perusahaan', 'telepon_2')) {
            $table->dropColumn('telepon_2');
        }
        });
    }
};
