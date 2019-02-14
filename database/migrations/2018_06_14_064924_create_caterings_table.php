<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCateringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caterings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cateringcode');
            $table->string('vendorcode');
            $table->string('vendorproductcode');
            $table->string('venuecode')->nullable();
            $table->string('typeofdining');
            $table->string('typeoffood');
            $table->string('typeofmeal');
            $table->string('producttitle');
            $table->longText('serviceableevents');
            $table->longText('menu');
            $table->string('maximumservinglimit');
            $table->string('productprice');
            $table->longText('productimageupload');
            $table->longText('ratevariationpercentage');
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
        Schema::dropIfExists('caterings');
    }
}
