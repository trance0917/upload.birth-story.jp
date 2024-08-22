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
        Schema::table('mst_maternity_users', function (Blueprint $table) {
            $table->integer('is_send_mail')->unsigned()->default(0)->after('is_send_line')->comment('評価をメールに送るかどうかのフラグ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_maternity_users', function (Blueprint $table) {
            $table->dropColumn('is_send_mail');
        });
    }
};
