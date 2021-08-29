<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationsFieldsToOrderEvalutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_evalutions', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->after('insertion_date')->nullable();
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
        Schema::table('order_evalutions', function (Blueprint $table) {
            //
        });
    }
}
