<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationsFieldsToOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->unsignedBigInteger('provider_id')->after('insertion_date')->nullable();
            $table->foreign('provider_id')->references('id')->on('users')->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('order_services_id')->after('provider_id')->nullable();
            $table->foreign('order_services_id')->references('id')->on('order_services')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('order_id')->after('order_services_id')->nullable();
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
        Schema::table('offers', function (Blueprint $table) {
            //
        });
    }
}
