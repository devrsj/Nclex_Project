<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShippingDaysToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('shipping_day')->nullable();
            $table->integer('shipping_cost')->nullable();
            $table->integer('return_days')->nullable();
            $table->string('warranty')->nullable();
            $table->string('sku')->nullable();
            $table->string('tax_name')->nullable();
            $table->integer('tax_rate')->nullable();
            
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
