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
        Schema::create('withdraw_record', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tg_id')->nullable();
            $table->string('username')->nullable();
            $table->string('first_name')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->tinyInteger('status')->nullable()->comment('0=申请;1=提现成功');
            $table->string('address')->nullable()->comment('提现地址');
            $table->string('addr_type')->nullable()->comment('地址类型');
            $table->bigInteger('group_id')->nullable();
            $table->string('remark')->nullable();
            $table->softDeletes();
            $table->integer('admin_id')->nullable();
            $table->index(['tg_id', 'status']); // Add any necessary indexes based on your queries
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
        Schema::dropIfExists('withdraw_record');
    }
};
