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
        Schema::create('recharge_record', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tg_id')->nullable();
            $table->string('username')->nullable();
            $table->decimal('amount', 10, 2)->nullable()->comment('充值金额');
            $table->tinyInteger('status')->default(0)->comment('状态:0=进行中;1=充值成功');
            $table->tinyInteger('type')->nullable()->comment('类型:1=后台充值;2=自动充值');
            $table->string('first_name')->nullable();
            $table->bigInteger('admin_id')->nullable();
            $table->bigInteger('group_id')->nullable();
            $table->string('remark')->nullable();
            $table->softDeletes('deleted_at')->nullable();
            $table->string('trx_hash')->nullable();
            $table->string('tail', 10)->nullable();
            $table->index(['tg_id', 'status']); // Add any other indexes you need
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
        Schema::dropIfExists('recharge_record');
    }
};
