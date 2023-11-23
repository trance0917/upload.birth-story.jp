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
        Schema::create('tbl_patients', function (Blueprint $table) {
            $table->integer('tbl_patient_id')->unsigned()->autoIncrement()->comment('患者さんID');
            $table->integer('mst_maternity_id')->unsigned()->comment('産院ID');
            $table->string('code', 255)->comment('8桁のコード');
            $table->string('line_name', 255)->comment('line上での患者さんの名前');
            $table->string('line_user_id', 255)->comment('LINE user ID');
            $table->string('richmenu_id', 255)->comment('設定しているリッチメニュー');


            $table->string('name', 255)->nullable()->default(null)->comment('名前');
            $table->string('roman_alphabet', 255)->nullable()->default(null)->comment('ローマ字表記');

            $table->string('baby_name', 255)->nullable()->default(null)->comment('ベビー名前');
            $table->string('baby_roman_alphabet', 255)->nullable()->default(null)->comment('ベビーローマ字表記');

            $table->date('birth_day')->nullable()->default(null)->comment('ベビーの誕生日');
            $table->time('birth_time')->nullable()->default(null)->comment('産まれた時間');

            $table->integer('weight')->nullable()->default(null)->unsigned()->comment('体重');
            $table->decimal('height', 10, 1)->nullable()->default(null)->unsigned()->comment('身長');

            $table->tinyInteger('sex')->unsigned()->nullable()->default(null)->comment('性別 1:男の子 2:女の子');
            $table->tinyInteger('what_number')->unsigned()->nullable()->default(null)->comment('第〇子 1:第1子～10');

            $table->date('health_check')->nullable()->default(null)->comment('1か月健診日');
            $table->text('message')->nullable()->default(null)->comment('備考');
            $table->tinyInteger('is_use_instagram')->unsigned()->nullable()->default(null)->comment('インスタグラムの掲載を認めるか');

            $table->text('review')->nullable()->default(null)->comment('レビューの内容');
            $table->string('paypayid',255)->nullable()->default(null)->comment('paypayid');

            $table->timestamp('completed_at')->nullable()->default(null)->comment('制作完了日時');
            $table->timestamp('undertook_at')->nullable()->default(null)->comment('作業開始日時');
            $table->integer('undertook_by')->unsigned()->default(null)->comment('作成者（スタッフID）');

            $table->text('memo')->nullable()->default(null)->comment('メモ書き');

            $table->softDeletes()->default(null)->nullable()->comment('削除日時(論理削除)');
            $table->timestamps();

            $table->comment('患者テーブル');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_patients');
    }
};
