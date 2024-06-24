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
            $table->integer('application_type')->unsigned()->after('type')->comment('1:フロント、2:システム');
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
            $table->dropColumn('application_type');
        });
    }
};
