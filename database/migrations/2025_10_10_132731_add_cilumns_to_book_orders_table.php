<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCilumnsToBookOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_orders', function (Blueprint $table) {
            $table->string('customer_name')->nullable()->after('user_id');
            $table->string('email')->nullable()->after('customer_name');
            $table->string('phone_prefix', 10)->nullable()->after('email');
            $table->string('phone', 20)->nullable()->after('phone_prefix');
            $table->string('address')->nullable()->after('phone');
            $table->float('amount')->after('status_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_orders', function (Blueprint $table) {
            $table->dropColumn('customer_name');
            $table->dropColumn('email');
            $table->dropColumn('phone_prefix');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('amount');
        });
    }
}
