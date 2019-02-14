<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('venuecode');
            $table->string('vendorcode');
            $table->string('vendorproductcode');
            $table->string('venueparentcode')->nullable();
            $table->string('producttitle');
            $table->string('address');
            $table->string('productdescription');
            $table->longText('serviceableevents');
            $table->longText('availability');
            $table->string('catering');
            $table->string('productprice');
            $table->string('servicecharge');
            $table->string('ratevariationpercentage');
            $table->longText('productimageupload');
            $table->string('stagedimensions');
            $table->string('seatingchairsavailability');
            $table->string('diningcapacity');
            $table->string('diningequipment');
            $table->string('diningseatingavailability');
            $table->string('indooroutdoor');
            $table->string('acnonac');
            $table->string('seatingcapacity');
            $table->string('parkingspaceavailability');
            $table->longText('roomavailability');
            $table->string('noofrooms')->nullable();
            $table->string('buffetspace');
            $table->string('diningtype');
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
        Schema::dropIfExists('venues');
    }
}
