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
            $table->integer('payment_status')->unsigned()->default(1)->comment('支払い状態 [1:未回答 2:回答済 3:支払済 4:却下 9:その他]')->change();
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
            $table->integer('payment_status')->unsigned()->default(1)->comment('支払い状態 [1:手続き中 2:支払済 3:却下 4:その他 5:未回答]')->change();
        });
    }
};
