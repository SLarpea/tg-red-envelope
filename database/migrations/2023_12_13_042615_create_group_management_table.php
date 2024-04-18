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
        Schema::create('group_management', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('group_id');
            $table->string('name');
            $table->string('remark');
            $table->tinyInteger('status');
            $table->string('service_url');
            $table->string('recharge_url');
            $table->string('channel_url');
            $table->string('photo_id');
            $table->bigInteger('admin_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_management');
    }
};
