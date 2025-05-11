<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tbl_line_messages', function (Blueprint $table) {
            $table->id();
            $table->string('tbl_patient_id'); // LINEの送信先ID
            $table->text('message')->nullable(); // テキストメッセージ（任意）
            $table->string('image1_url')->nullable(); // 1枚目の画像URL
            $table->string('image2_url')->nullable(); // 2枚目の画像URL
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_line_messages');
    }
};
