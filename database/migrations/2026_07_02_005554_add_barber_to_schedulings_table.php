<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('schedulings', function (Blueprint $table) {
            if (!Schema::hasColumn('schedulings', 'barber')) {
                $table->string('barber')->after('service');
            }
        });
    }

    public function down(): void
    {
        Schema::table('schedulings', function (Blueprint $table) {
            $table->dropColumn('barber');
        });
    }
};