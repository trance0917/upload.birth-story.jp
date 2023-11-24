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
            $table->timestamp('completed_at')->nullable()->default(null)->after('undertook_by')->comment('制作完了日時');
            $table->dateTime('submitted_at')->nullable()->default(null)->comment('提出完了日時')->change();
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
            $table->dropColumn('completed_at');
            $table->dateTime('submitted_at')->nullable()->default(null)->comment('制作完了日時')->change();
        });
    }
};
