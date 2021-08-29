<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationsFieldsToAddingToBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adding_to_bills', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->after('total_price_services')->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adding_to_bills', function (Blueprint $table) {
            //
        });
    }
}
