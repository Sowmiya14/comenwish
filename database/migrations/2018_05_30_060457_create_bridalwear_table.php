<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBridalwearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bridalwear', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bridalcode');
            $table->string('vendorcode');
            $table->string('vendorproductcode');
            $table->string('producttitle');
            $table->string('productdescription');
            $table->integer('size');
            $table->string('shipping');
            $table->string('cashondelivery');
            $table->string('livedemo');
            $table->longText('productimageupload');
            $table->string('productprice');
            $table->string('status');
            $table->float('ratevariationpercentage',10,2 );
            $table->double('servicecharge',8,2);
            $table->string('createdby');
            $table->string('updatedby');
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
        Schema::dropIfExists('bridalwear');
    }
}
