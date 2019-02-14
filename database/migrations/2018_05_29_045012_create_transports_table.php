<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transportcode');
            $table->string('vendorcode');
            $table->string('vendorproductcode');
            $table->string('serviceablelocation');
            $table->string('typeoftransport');
            $table->string('typeofcomfort');
            $table->string('typeofvehicle');
            $table->string('typeofsubcategory');
            $table->string('typeofdrive');
            $table->string('producttitle');
            $table->string('pricing');
            $table->string('productprice');
            $table->longText('productimageupload');
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
        Schema::dropIfExists('transports');
    }
}
