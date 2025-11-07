<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWbItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wb_item', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('book_id')->unsigned()->nullable();
            $table->BigInteger('nmID')->unsigned()->nullable();
            $table->BigInteger('imtID')->unsigned()->nullable();
            $table->string('nmUUID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wb_item');
    }
}
