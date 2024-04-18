<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('group_management', function (Blueprint $table) {
            $table->bigInteger('admin_id')->change();
        });

        Schema::table('configs', function (Blueprint $table) {
            $table->bigInteger('admin_id')->change();
        });

        Schema::table('recharge_record', function (Blueprint $table) {
            $table->bigInteger('admin_id')->change();
        });

        Schema::table('withdraw_record', function (Blueprint $table) {
            $table->bigInteger('admin_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('group_management', function (Blueprint $table) {
            $table->integer('admin_id')->change();
        });

        Schema::table('configs', function (Blueprint $table) {
            $table->integer('admin_id')->change();
        });

        Schema::table('recharge_record', function (Blueprint $table) {
            $table->integer('admin_id')->change();
        });

        Schema::table('withdraw_record', function (Blueprint $table) {
            $table->integer('admin_id')->change();
        });


    }
};
