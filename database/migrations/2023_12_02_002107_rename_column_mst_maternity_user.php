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
            //カラム名変更
            $table->renameColumn('is_score_notification', 'is_review_notification');
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
            //カラム名変更
            $table->renameColumn('is_review_notification', 'is_score_notification');
        });
    }
};
