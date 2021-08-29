<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationsFieldsToOrderServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_services', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->after('service_numbers')->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('service_id')->after('order_id')->nullable();
            $table->foreign('service_id')->references('id')->on('lkp_services')->onUpdate('cascade')
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
        Schema::table('order_services', function (Blueprint $table) {
            //
        });
    }
}
