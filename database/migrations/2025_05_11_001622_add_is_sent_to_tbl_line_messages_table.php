<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('tbl_line_messages', function (Blueprint $table) {
            $table->boolean('is_sent')->default(false)->after('image2_url'); // 送信フラグ
        });
    }

    public function down(): void
    {
        Schema::table('tbl_line_messages', function (Blueprint $table) {
            $table->dropColumn('is_sent');
        });
    }
};
