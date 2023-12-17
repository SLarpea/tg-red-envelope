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
        Schema::create('invite_links', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tg_id')->nullable();
            $table->string('invite_link', 100)->nullable()->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->bigInteger('group_id')->nullable();
            $table->index(['group_id', 'invite_link']);
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
        Schema::dropIfExists('invite_links');
    }
};
