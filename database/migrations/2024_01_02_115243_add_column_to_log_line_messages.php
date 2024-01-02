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
        Schema::table('log_line_messages', function (Blueprint $table) {
            $table->integer('http_status')->unsigned()->after('message')->comment('通信結果:200=>正常、それ以外=>異常');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_line_messages', function (Blueprint $table) {
            $table->dropColumn('http_status');
        });
    }
};
