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
        Schema::create('lucky_money', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sender_id')->nullable()->comment('发送用户id');
            $table->decimal('amount', 10, 2)->nullable()->comment('红包金额');
            $table->decimal('received', 10, 2)->default(0.00)->comment('被领取金额');
            $table->integer('number')->nullable()->comment('红包个数');
            $table->tinyInteger('lucky')->nullable()->comment('是否随机');
            $table->integer('thunder')->nullable()->comment('雷');
            $table->string('chat_id', 50)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('群组id');
            $table->text('red_list')->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('红包数组');
            $table->string('sender_name', 200)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('发送者名称');
            $table->decimal('lose_rate', 10, 2)->nullable()->comment('红包倍数');
            $table->tinyInteger('status')->default(1)->comment('状态:1=正常;2=已领完;3=已过期');
            $table->string('message_id', 100)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('消息id');
            $table->tinyInteger('type')->default(1)->comment('类型:1=雷包;2=福利红包');
            $table->integer('received_num')->default(0)->comment('领取数量');
            $table->index('status');
            $table->index('chat_id');
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
        Schema::dropIfExists('lucky_money');
    }
};
