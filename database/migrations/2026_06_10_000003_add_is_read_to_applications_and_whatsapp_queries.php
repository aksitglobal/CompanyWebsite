<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            if (!Schema::hasColumn('applications', 'is_read')) {
                $table->boolean('is_read')->default(false)->after('cv_path');
            }
        });

        Schema::table('whatsapp_queries', function (Blueprint $table) {
            if (!Schema::hasColumn('whatsapp_queries', 'is_read')) {
                $table->boolean('is_read')->default(false)->after('description');
            }
        });
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn('is_read');
        });
        Schema::table('whatsapp_queries', function (Blueprint $table) {
            $table->dropColumn('is_read');
        });
    }
};
