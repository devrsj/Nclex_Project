<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_code')->nullable();
            $table->string('discount_type')->nullable();
            $table->integer('amount')->nullable();
            $table->string('linked_type')->nullable();
            $table->integer('linked_id')->nullable();
            $table->integer('usage_limit')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('registered_users')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
