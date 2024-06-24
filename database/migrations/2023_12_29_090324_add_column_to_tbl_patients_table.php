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
            $table->dropColumn('present_file_name');
            $table->string('present_photoart_path', 255)->nullable()->default(null)->after('completed_at')->comment('プレゼント用のフォトアートファイル名');
            $table->string('present_movie_path', 255)->nullable()->default(null)->after('completed_at')->comment('プレゼント用の動画ファイル名');
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
            $table->string('present_file_name', 255)->nullable()->default(null)->after('presented_at')->comment('プレゼント用のファイル名');
            $table->dropColumn('present_photoart_path');
            $table->dropColumn('present_movie_path');
        });
    }
};
