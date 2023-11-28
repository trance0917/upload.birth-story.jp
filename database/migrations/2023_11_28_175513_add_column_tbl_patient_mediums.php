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
        Schema::table('tbl_patient_mediums', function (Blueprint $table) {
            $table->string('file_name', 255)->after('type')->comment('ファイル名');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_patient_mediums', function (Blueprint $table) {
            //カラムの削除
            $table->dropColumn('file_name');
        });
    }
};
