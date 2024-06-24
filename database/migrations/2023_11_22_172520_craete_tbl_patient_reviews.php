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
        Schema::create('tbl_patient_reviews', function (Blueprint $table) {
            $table->integer('tbl_patient_review_id')->unsigned()->autoIncrement()->comment('患者レビューID');
            $table->integer('tbl_patient_id')->unsigned()->comment('患者さんID');
            $table->integer('mst_maternity_review_id')->unsigned()->comment('産院レビューID');
            $table->integer('score')->unsigned()->comment('1~5のスコア');
            $table->timestamps();

            $table->comment('患者レビュー');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_patient_reviews');
    }
};
