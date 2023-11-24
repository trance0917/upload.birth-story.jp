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
        Schema::table('log_line_webhooks', function (Blueprint $table) {
            $table->string('type', 255)->nullable()->default(null)->change();
            $table->integer('mst_maternity_id')->nullable()->default(null)->unsigned()->change();
            $table->string('line_user_id', 255)->nullable()->default(null)->change();
            $table->json('api_data')->nullable()->default(null)->change();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_line_webhooks', function (Blueprint $table) {
            $table->string('type', 255)->nullable(false)->change();
            $table->integer('mst_maternity_id')->nullable(false)->unsigned()->change();
            $table->string('line_user_id', 255)->nullable(false)->change();
            $table->json('api_data')->nullable(false)->change();
        });
    }
};
