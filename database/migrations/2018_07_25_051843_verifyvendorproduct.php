<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Verifyvendorproduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('verify_vendor_product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vendor_id');
            $table->integer('vendorproduct_id')->unsigned();
            $table->string('vendorcode');
            $table->integer('verified')->default('0')->unsigned();
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
        Schema::dropIfExists('verify_vendor_product');
    }
}
