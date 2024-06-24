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
            $table->dropColumn('line_message_channel_secret');
            $table->dropColumn('line_message_channel_token');
            $table->dropColumn('line_destination');
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
            $table->string('line_message_channel_secret', 255)->after('code')->comment('LINEチャネルシークレット');
            $table->string('line_message_channel_token', 255)->after('line_message_channel_secret')->comment('LINEチャネルアクセストークン');
            $table->string('line_destination', 255)->after('line_message_channel_token')->comment('LINEチャネルアクセストークン');

        });
    }
};
