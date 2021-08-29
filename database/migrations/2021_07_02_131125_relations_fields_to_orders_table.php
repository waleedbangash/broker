<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationsFieldsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->unsignedBigInteger('order_status_id')->after('occation_time')->nullable();
            $table->foreign('order_status_id')->references('id')->on('lkp_order_statuses')->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('provider_id')->after('order_status_id')->nullable();
            $table->foreign('provider_id')->references('id')->on('users')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('client_id')->after('provider_id')->nullable();
            $table->foreign('client_id')->references('id')->on('users')->onUpdate('cascade')
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
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
