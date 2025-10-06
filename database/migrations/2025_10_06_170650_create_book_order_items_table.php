<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_order_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('book_order_id')->unsigned();
            $table->bigInteger('book_id')->unsigned()->nullable();
            $table->string('title', 200);
            $table->decimal('price', 10, 2)->unsigned();
            $table->tinyInteger('quantity')->unsigned()->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('book_order_items');
    }
}
