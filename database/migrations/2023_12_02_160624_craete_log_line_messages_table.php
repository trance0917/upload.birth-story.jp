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
        Schema::create('log_line_messages', function (Blueprint $table) {
            $table->integer('log_line_message_id')->unsigned()->autoIncrement();
            $table->string('type', 255)->comment('1:患者 2:産院スタッフ 3:アンジュクリエイト');
            $table->integer('tbl_patient_id')->default(null)->nullable()->unsigned()->comment('患者ID');
            $table->integer('mst_maternity_user_id')->default(null)->nullable()->unsigned()->comment('産院スタッフID');
            $table->string('line_user_id', 255)->comment('送り先LINE user ID');
            $table->text('memo')->nullable()->default(null)->comment('送信内容');
            $table->softDeletes()->default(null)->nullable()->comment('削除日時(論理削除)');
            $table->timestamps();

            $table->comment('ラインメッセージに送った内容のログ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_line_messages');
    }
};
