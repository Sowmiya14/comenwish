<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cakes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cakecode');
            $table->string('vendorcode');
            $table->string('vendorproductcode');
            $table->string('serviceablelocation');
            $table->string('typeofcake');
            $table->string('flavour');
            $table->string('producttitle');
            $table->string('productdescription');
            $table->string('cakedelivery');
            $table->float('cakesize');
            $table->string('pricing');
            $table->longText('productimageupload');
            $table->double('productprice');
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
        Schema::dropIfExists('cakes');
    }
}