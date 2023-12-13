<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('user_managements', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50)->nullable()->comment('用户名');
            $table->string('first_name', 200)->nullable()->comment('用户名');
            $table->bigInteger('tg_id')->nullable()->comment('tgId');
            $table->decimal('balance', 10, 2)->default(0.00)->comment('余额');
            $table->tinyInteger('status')->default(1)->comment('状态:1=正常;0=离开');
            $table->string('invite_user', 200)->nullable()->comment('邀请人id');
            $table->bigInteger('group_id')->nullable()->comment('组id');
            $table->tinyInteger('has_thunder')->default(0)->comment('发包必有雷');
            $table->tinyInteger('pass_mine')->default(0)->comment('抢包不中雷');
            $table->tinyInteger('auto_get')->default(0)->comment('自动领取红包:1=自动领取');
            $table->string('withdraw_addr', 255)->nullable();
            $table->tinyInteger('no_thunder')->default(0)->comment('发包无雷');
            $table->tinyInteger('get_mine')->default(0)->comment('抢包必中雷');
            $table->tinyInteger('online')->default(0);
            $table->integer('send_chance')->nullable()->comment('发包雷的概率');
            $table->timestamps();

            $table->index('tg_id');
            $table->index(['tg_id', 'group_id']);
            $table->index('auto_get');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_managements');
    }
};
