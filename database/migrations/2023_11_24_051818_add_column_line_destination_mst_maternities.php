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
        Schema::table('mst_maternities', function (Blueprint $table) {
            $table->string('line_destination', 255)->after('line_message_channel_token')->comment('LINEチャネルアクセストークン');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_maternities', function (Blueprint $table) {
            //カラムの削除
            $table->dropColumn('line_destination');
        });
    }
};
