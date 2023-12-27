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
            $table->dropColumn('voom_link');
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
            $table->string('voom_link', 255)->after('instagram_url')->comment('voomのリンク');
        });
    }
};
