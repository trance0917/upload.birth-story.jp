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
        Schema::create('log_line_webhooks', function (Blueprint $table) {
            $table->integer('log_line_webhook_id')->unsigned()->autoIncrement()->comment('line webhookID');
            $table->string('type', 255)->comment('メッセージタイプ');
            $table->integer('mst_maternity_id')->unsigned()->comment('産院ID');
            $table->string('line_user_id', 255)->comment('LINE user ID');
            $table->jsonb('api_data')->comment('APIのデータ丸ごと');
            $table->softDeletes()->default(null)->nullable()->comment('削除日時(論理削除)');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_line_webhooks');
    }
};
