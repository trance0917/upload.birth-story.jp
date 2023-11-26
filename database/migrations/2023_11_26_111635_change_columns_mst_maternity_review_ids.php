
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
        Schema::table('mst_maternity_questions', function (Blueprint $table) {
            $table->renameColumn('mst_maternity_review_id', 'mst_maternity_question_id');
        });
        Schema::table('tbl_patient_reviews', function (Blueprint $table) {
            $table->renameColumn('mst_maternity_review_id', 'mst_maternity_question_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_maternity_questions', function (Blueprint $table) {
            $table->renameColumn('mst_maternity_question_id', 'mst_maternity_review_id');
        });
        Schema::table('tbl_patient_reviews', function (Blueprint $table) {
            $table->renameColumn('mst_maternity_question_id', 'mst_maternity_review_id');
        });

    }
};
