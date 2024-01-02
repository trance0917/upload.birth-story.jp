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
        Schema::table('log_line_messages', function (Blueprint $table) {
            $table->integer('type')->nullable()->default(null)->comment('1:患者 2:産院スタッフ 3:アンジュクリエイト')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_line_messages', function (Blueprint $table) {
            $table->string('type', 255)->comment('1:患者 2:産院スタッフ 3:アンジュクリエイト')->change();
        });
    }
};
