<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterQuizzesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quizzes_categories', function (Blueprint $table) {
            $table->string('meta_description')->after('slug');
            $table->string('description')->after('meta_description');
            $table->string('picture_url')->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quizzes_categories', function (Blueprint $table) {
            $table->dropColumn('meta_description');
            $table->dropColumn('description');
            $table->dropColumn('picture_url');
        });
    }
}
