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
        Schema::create('log_mails', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('view', 128)->nullable();
            $table->text('from');
            $table->text('to');
            $table->text('cc')->nullable();
            $table->text('bcc')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->string('subject', 256)->nullable();
            $table->mediumText('message')->nullable();
            $table->string('temp_file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_mails');
    }
};
