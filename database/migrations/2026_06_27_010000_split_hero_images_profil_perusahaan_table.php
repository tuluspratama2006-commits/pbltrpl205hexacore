<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_perusahaan', function (Blueprint $table) {
            if (! Schema::hasColumn('profil_perusahaan', 'dashboard_hero_image')) {
                $table->text('dashboard_hero_image')->nullable()->after('hero_image');
            }

            if (! Schema::hasColumn('profil_perusahaan', 'tentang_hero_image')) {
                $table->text('tentang_hero_image')->nullable()->after('dashboard_hero_image');
            }
        });

        // Optional: copy existing hero_image into both new fields if they are empty
        // so current data still shows after migration.
        // (Using raw SQL to avoid Eloquent dependency in migration)
        try {
            DB::statement(
                'UPDATE profil_perusahaan SET dashboard_hero_image = COALESCE(dashboard_hero_image, hero_image), tentang_hero_image = COALESCE(tentang_hero_image, hero_image)'
            );
        } catch (Throwable $e) {
            // ignore if table has no rows yet
        }
    }

    public function down(): void
    {
        Schema::table('profil_perusahaan', function (Blueprint $table) {
            if (Schema::hasColumn('profil_perusahaan', 'dashboard_hero_image')) {
                $table->dropColumn('dashboard_hero_image');
            }
            if (Schema::hasColumn('profil_perusahaan', 'tentang_hero_image')) {
                $table->dropColumn('tentang_hero_image');
            }
        });
    }
};
