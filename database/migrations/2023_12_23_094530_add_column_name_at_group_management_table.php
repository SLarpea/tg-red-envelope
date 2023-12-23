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
        Schema::table('group_management', function (Blueprint $table) {
            // Add your new column here
            $table->string('name')->nullable()->after('group_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('group_management', function (Blueprint $table) {
            // If you need to rollback, remove the added column
            $table->dropColumn('name');
        });
    }
};
