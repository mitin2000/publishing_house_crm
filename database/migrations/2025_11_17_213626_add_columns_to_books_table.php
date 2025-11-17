<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('code')->nullable()->after('id');
            $table->string('age_limit')->nullable()->after('isbn');
            $table->string('cover')->nullable()->after('age_limit');
            $table->string('paper_type')->nullable()->after('cover');
            $table->string('lang')->nullable()->after('paper_type');
            $table->unsignedBigInteger('weight')->nullable()->after('lang');
            $table->unsignedBigInteger('pages')->nullable()->after('weight');
            $table->unsignedBigInteger('height')->nullable()->after('pages');
            $table->unsignedBigInteger('depth')->nullable()->after('height');
            $table->unsignedBigInteger('width')->nullable()->after('depth');
            $table->string('edition')->nullable()->after('width');
            $table->string('country')->nullable()->after('edition');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('code');
            $table->dropColumn('age_limit');
            $table->dropColumn('cover');
            $table->dropColumn('paper_type');
            $table->dropColumn('lang');
            $table->dropColumn('weight');
            $table->dropColumn('pages');
            $table->dropColumn('height');
            $table->dropColumn('depth');
            $table->dropColumn('width');
            $table->dropColumn('edition');
            $table->dropColumn('country');
        });
    }
}
