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
        Schema::create('user_management', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('first_name');
            $table->bigInteger('tg_id');
            $table->decimal('balance', 10, 2);
            $table->string('invite_user');
            $table->bigInteger('group_id');
            $table->tinyInteger('has_thunder');
            $table->tinyInteger('pass_mine');
            $table->tinyInteger('auto_get');
            $table->string('withdraw_addr');
            $table->tinyInteger('no_thunder');
            $table->tinyInteger('get_mine');
            $table->tinyInteger('online');
            $table->integer('send_chance');
            $table->timestamps();
            $table->tinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_management');
    }
};
