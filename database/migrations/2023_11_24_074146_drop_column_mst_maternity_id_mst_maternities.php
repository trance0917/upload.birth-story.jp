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
            //カラムの削除
            $table->dropColumn('mst_maternity_id');
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
            $table->integer('mst_maternity_id')->unsigned()->after('type')->comment('産院ID');
        });
    }
};
