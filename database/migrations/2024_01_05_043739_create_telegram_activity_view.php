<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `telegram_activity_view` AS
            SELECT
              `lucky_history`.`id`         AS `id`,
              `lucky_history`.`user_id`    AS `user_id`,
              `lucky_history`.`lucky_id`   AS `lucky_id`,
              `lucky_history`.`is_thunder` AS `is_thunder`,
              `lucky_history`.`amount`     AS `amount`,
              `lucky_history`.`lose_money` AS `lose_money`,
              `lucky_history`.`first_name` AS `first_name`,
              `lucky_history`.`created_at` AS `created_at`,
              `lucky_history`.`updated_at` AS `updated_at`,
              `lucky_money`.`chat_id`      AS `chat_id`
            FROM (`lucky_history`
               LEFT JOIN `lucky_money`
                 ON ((`lucky_money`.`id` = `lucky_history`.`lucky_id`)))
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS `telegram_activity_view`');
    }
};
