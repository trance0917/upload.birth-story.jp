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
        Schema::table('tbl_patients', function (Blueprint $table) {
            $table->tinyInteger('is_present_after_notified')->unsigned()->default(0)->after('presented_at')->comment('プレゼント後のアフター通知のバッチを実行したかだけを見るフラグ。メッセージ送ってようが送ってなかろうがバッチの対象レコードとして抽出されていたら1になる');
            $table->timestamp('present_after_notified_at')->nullable()->default(null)->after('is_present_after_notified')->comment('プレゼント後のアフター通知のメッセージを飛ばした日時。メッセージが飛ばされていたら日付が入る。メッセされていない場合はnullのまま。');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_patients', function (Blueprint $table) {
            $table->dropColumn('present_after_notified_at');
            $table->dropColumn('is_present_after_notified');
        });
    }
};
