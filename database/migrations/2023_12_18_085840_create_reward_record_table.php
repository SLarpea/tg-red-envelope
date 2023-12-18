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
        Schema::create('reward_record', function (Blueprint $table) {
            $table->id();
            $table->integer('lucky_id')->nullable()->comment('红包id');
            $table->decimal('amount', 10, 2)->nullable()->comment('金额');
            $table->bigInteger('tg_id')->nullable()->comment('中奖用户id');
            $table->bigInteger('group_id')->nullable()->comment('组id');
            $table->string('remark', 255)->nullable()->comment('备注');
            $table->bigInteger('sender_id')->nullable()->comment('发包者id');
            $table->string('reward_num', 16)->nullable()->comment('中奖数字');
            $table->tinyInteger('type')->nullable()->comment('中奖类型: 1=豹子; 2=顺子');
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
        Schema::dropIfExists('reward_record');
    }
};
