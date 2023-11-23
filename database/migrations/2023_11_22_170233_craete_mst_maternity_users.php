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
        Schema::create('mst_maternity_users', function (Blueprint $table) {
            $table->integer('mst_maternity_user_id')->unsigned()->autoIncrement()->comment('産院スタッフID');
            $table->integer('mst_maternity_id')->unsigned()->comment('産院ID');
            $table->string('name', 255)->comment('スタッフ名');
            $table->string('line_user_id', 255)->nullable()->default(null)->comment('LINE user ID');
            $table->tinyInteger('is_score_notification')->unsigned()->default(1)->comment('スコア通知を受け取るか');
            $table->tinyInteger('is_take_photoart')->unsigned()->default(1)->comment('フォトアートを受け取るか');


            $table->softDeletes()->default(null)->nullable()->comment('削除日時(論理削除)');
            $table->timestamps();

            $table->comment('産院スタッフマスタ');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_maternity_users');
    }
};
