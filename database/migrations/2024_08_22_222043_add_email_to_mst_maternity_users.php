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
        Schema::table('mst_maternity_users', function (Blueprint $table) {
            $table->string('email', 255)->nullable()->default(null)->after('line_user_id')->comment('E-mail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_maternity_users', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }
};
