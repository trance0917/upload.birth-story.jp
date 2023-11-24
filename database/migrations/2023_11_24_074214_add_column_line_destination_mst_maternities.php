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
        Schema::table('log_line_webhooks', function (Blueprint $table) {
            $table->string('line_destination', 255)->after('type')->comment('LINEチャンネルの固有ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_line_webhooks', function (Blueprint $table) {
            //カラムの削除
            $table->dropColumn('line_destination');
        });
    }
};
