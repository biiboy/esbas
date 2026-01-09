<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('essentials_attendances', function (Blueprint $table) {
            $table->integer('lembur_menit')->nullable()->after('telat_menit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('essentials_attendances', function (Blueprint $table) {
            $table->dropColumn(['lembur_menit']);
        });
    }
};
