<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_perusahaan', function (Blueprint $table) {
            $table->string('alamat_2')->nullable()->after('alamat');
            $table->text('maps_embed_2')->nullable()->after('maps_embed');
            $table->string('instagram', 255)->nullable()->after('whatsapp');
            $table->string('facebook', 255)->nullable()->after('instagram');
            $table->string('linkedin', 255)->nullable()->after('facebook');
            $table->string('telepon_2', 30)->nullable()->after('telepon');
        });
    }

    public function down(): void
    {
        Schema::table('profil_perusahaan', function (Blueprint $table) {
            $table->dropColumn([
                'alamat_2',
                'maps_embed_2',
                'instagram',
                'facebook',
                'linkedin',
                'telepon_2',
            ]);
        });
    }
};