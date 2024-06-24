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
        Schema::dropIfExists('tbl_contacts');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('tbl_contacts', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 32);
            $table->string('mail', 256);
            $table->string('tel', 32)->nullable();
            $table->text('message');
            $table->string('ipaddress', 32)->nullable();
            $table->string('hostname', 256)->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

    }
};
