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
        Schema::table('mst_maternities', function (Blueprint $table) {
            $table->tinyInteger('is_case')->unsigned()->default(1)->after('memo')->comment('ケースがあるプランか');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_maternities', function (Blueprint $table) {
            $table->dropColumn('is_case');
        });
    }
};
