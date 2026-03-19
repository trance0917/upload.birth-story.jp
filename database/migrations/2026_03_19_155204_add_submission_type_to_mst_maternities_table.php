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
            // is_case の次に int型の submission_type を追加
            $table->integer('submission_type')
                ->nullable() // ※既存レコードがある場合エラーにならないようにnullableにしています
                ->default(1)
                ->after('is_case')
                ->comment('提出タイプ');
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
            // ロールバック用にカラムの削除処理を記述
            $table->dropColumn('submission_type');
        });
    }
};
