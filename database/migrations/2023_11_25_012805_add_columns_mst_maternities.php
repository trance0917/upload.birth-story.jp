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
            $table->string('line_url', 255)->after('review_link')->comment('LINEオフィシャルのURL');
            $table->string('official_url', 255)->after('line_url')->comment('産院オフィシャルのURL');
            $table->string('instagram_url', 255)->after('official_url')->comment('インスタグラムのURL');
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
            $table->dropColumn('line_url');
            $table->dropColumn('official_url');
            $table->dropColumn('instagram_url');
        });
    }
};
