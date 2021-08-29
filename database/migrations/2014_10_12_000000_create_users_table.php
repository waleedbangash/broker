<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->string('password');
            $table->string('commercial_registration_no')->unique()->nullable();
            $table->double('shop_latitude')->nullable();
            $table->double('shop_longitude')->nullable();
            $table->string('shop_city')->nullable();;
            $table->string('shop_address')->nullable();
            $table->string('otp')->nullable();
            $table->timestamp('Register_date');
            $table->string('last_online_date')->nullable();
               $table->string('api_token',2024)->nullable();
            $table->string('device_token',2024)->nullable();
            $table->rememberToken();
           $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
