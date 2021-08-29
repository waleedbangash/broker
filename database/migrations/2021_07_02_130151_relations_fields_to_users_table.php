<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationsFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_type')->after('api_token')->nullable();
            $table->foreign('user_type')->references('id')->on('lkp_user_types')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('user_status')->default(2)->after('user_type');
            $table->foreign('user_status')->references('id')->on('lkp_user_statuses')->onUpdate('cascade')
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
