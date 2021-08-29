<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationsFieldsToOfferChettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offer_chettings', function (Blueprint $table) {

            $table->unsignedBigInteger('from_user_id')->after('id')->nullable();
            $table->foreign('from_user_id')->references('id')->on('users')->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('to_user_id')->after('from_user_id')->nullable();
            $table->foreign('to_user_id')->references('id')->on('users')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('order_id')->after('to_user_id')->nullable();
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
        Schema::table('offer_chettings', function (Blueprint $table) {
            //
        });
    }
}
