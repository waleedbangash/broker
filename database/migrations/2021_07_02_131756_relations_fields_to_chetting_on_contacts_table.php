<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationsFieldsToChettingOnContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chetting_on_contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('contact_id')->after('hour_time')->nullable();;
            $table->foreign('contact_id')->references('id')->on('contacts')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->after('contact_id')->nullable();;
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')
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
        Schema::table('chetting_on_contacts', function (Blueprint $table) {
            //
        });
    }
}
