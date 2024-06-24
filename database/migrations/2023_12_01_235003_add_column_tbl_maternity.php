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
            $table->integer('unit_price')->default(0)->unsigned()->after('memo')->comment('商品単価');
            $table->integer('review_point')->default(0)->unsigned()->after('unit_price')->comment('レビューで支払うポイント');
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
            $table->dropColumn('unit_price');
            $table->dropColumn('review_point');
        });
    }
};
