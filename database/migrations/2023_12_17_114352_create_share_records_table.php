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
        Schema::create('share_records', function (Blueprint $table) {
            $table->id();
            $table->integer('lucky_id')->nullable()->comment('红包id');
            $table->decimal('amount', 10, 2)->nullable()->comment('金额');
            $table->bigInteger('tg_id')->nullable()->comment('用户id');
            $table->bigInteger('group_id')->nullable()->comment('组id');
            $table->string('remark', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_general_ci')->comment('备注');
            $table->bigInteger('share_user_id')->nullable()->comment('分享者id');
            $table->bigInteger('sender_id')->nullable()->comment('发包者id');
            $table->decimal('profit_amount', 10, 2)->nullable();
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
        Schema::dropIfExists('share_records');
    }
};
