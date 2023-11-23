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
        Schema::create('tbl_patient_mediums', function (Blueprint $table) {
            $table->integer('tbl_patient_medium_id')->unsigned()->autoIncrement()->comment('患者メディアID');
            $table->integer('tbl_patient_id')->unsigned()->comment('患者さんID');
            $table->integer('type')->unsigned()->comment('echo|namecard|pregnancy|photoart|first_cry|movie');
            $table->timestamp('registered_at')->nullable()->default(null)->comment('登録日時');
            $table->string('registered_ext',255)->nullable()->default(null)->comment('拡張子');
            $table->integer('order')->unsigned()->default(1)->comment('並び順');
            $table->softDeletes()->default(null)->nullable()->comment('削除日時(論理削除)');
            $table->timestamps();

            $table->comment('患者メディアテーブル');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_patient_mediums');
    }
};
