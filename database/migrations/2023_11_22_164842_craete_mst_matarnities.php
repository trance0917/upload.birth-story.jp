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
        Schema::create('mst_maternities', function (Blueprint $table) {
            $table->integer('mst_maternity_id')->unsigned()->autoIncrement()->comment('産院ID');
            $table->string('name', 255)->comment('産院名');

            $table->string('line_message_channel_secret', 255)->comment('LINEチャネルシークレット');
            $table->string('line_message_channel_token', 255)->comment('LINEチャネルアクセストークン');

            $table->decimal('notification_review_score', 10, 1)->unsigned()->comment('スタッフに通知する評価の点数');
            $table->decimal('minimum_review_score', 10, 1)->unsigned()->comment('google口コミをプッシュするときの最低評価点数');
            $table->string('review_link', 255)->comment('google口コミの直リンク');

            $table->text('memo')->nullable()->default(null)->comment('備考');

            $table->softDeletes()->default(null)->nullable()->comment('削除日時(論理削除)');
            $table->timestamps();
            $table->comment('産院マスタ');
            //
            //google口コミの直リンク

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_maternities');
    }
};
