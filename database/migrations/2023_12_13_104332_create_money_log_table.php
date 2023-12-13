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
        Schema::create('money_logs', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10, 2)->nullable()->comment('金额');
            $table->bigInteger('tg_id')->nullable()->comment('用户id');
            $table->bigInteger('group_id')->nullable()->comment('组id');
            $table->string('remark', 255)->nullable()->comment('备注');
            $table->string('type', 30)->nullable()->comment('类型');
            $table->integer('lucky_id')->nullable()->comment('红包id');
            $table->decimal('balance', 10, 2)->default(0.00)->comment('当时余额');
            $table->index(['tg_id', 'created_at']); // Add any other indexes you need
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('money_logs');
    }
};
