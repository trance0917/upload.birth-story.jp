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
        Schema::create('mst_maternity_reviews', function (Blueprint $table) {
            $table->integer('mst_maternity_review_id')->unsigned()->autoIncrement()->comment('産院レビューID');
            $table->integer('mst_maternity_id')->unsigned()->comment('産院ID');
            $table->string('question', 255)->comment('質問文');
            $table->integer('order')->unsigned()->comment('並び順');
            $table->softDeletes()->default(null)->nullable()->comment('削除日時(論理削除)');
            $table->timestamps();

            $table->comment('産院レビュー項目');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_maternity_reviews');
    }
};
