<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('schedulings', 'price')) {
            Schema::table('schedulings', function (Blueprint $table) {
                $table->decimal('price', 8, 2)->default(0)->after('service');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('schedulings', 'price')) {
            Schema::table('schedulings', function (Blueprint $table) {
                $table->dropColumn('price');
            });
        }
    }
};
