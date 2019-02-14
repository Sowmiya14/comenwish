<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroomingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groomings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('groomcode');
            $table->string('vendorcode');
            $table->string('vendorproductcode');
            $table->string('producttitle');
            $table->string('productdescription');
            $table->integer('size');
            $table->string('shipping');
            $table->string('cashondelivery');
            $table->string('livedemo');
            $table->string('pricing');
            $table->longText('productimageupload');
            $table->string('productprice');
            $table->float('ratevariationpercentage',10,2 );
            $table->double('servicecharge',8,2);
            $table->string('status');
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
        Schema::dropIfExists('groomings');
    }
}
