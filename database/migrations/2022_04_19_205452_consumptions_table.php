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
        Schema::create('consumptions', function(Blueprint $table){
            $table->id();
            $table->integer('quantity');
            $table->timestamp('date');
            $table->string('product_id', 20);
            $table->bigInteger('customer_id');
            $table->foreign('product_id')->references('item_code')->on('product')->onDelete(null)->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
