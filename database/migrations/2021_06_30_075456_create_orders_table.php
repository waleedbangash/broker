<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_deliver_date')->nullable();
             $table->string('deliver_time')->nullable();
            $table->string('number_of_guest')->nullable();
            $table->string('nots')->nullable();
            $table->string('order_address')->nullable();
            $table->string('order_city')->nullable();
            $table->double('order_longitude')->nullable();
            $table->double('order_latitude')->nullable();
            $table->string('occation_time')->nullable();
            $table->string('service_fee')->nullable();
            $table->string('provider_end_status')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
