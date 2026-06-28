<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('admin_activities', function (Blueprint $table) {
            if (!Schema::hasColumn('admin_activities', 'admin_id')) {
                $table->unsignedBigInteger('admin_id')->nullable()->after('id');
            }

            if (!Schema::hasColumn('admin_activities', 'is_read')) {
                $table->boolean('is_read')->default(false)->after('target');
            }
        });
    }

    public function down(): void
    {
        Schema::table('admin_activities', function (Blueprint $table) {
            if (Schema::hasColumn('admin_activities', 'admin_id')) {
                $table->dropColumn('admin_id');
            }
            if (Schema::hasColumn('admin_activities', 'is_read')) {
                $table->dropColumn('is_read');
            }
        });
    }
};

