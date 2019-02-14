<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('giftcode');
            $table->string('vendorcode');
            $table->string('vendorproductcode');
            $table->string('typeofgift');
            $table->string('producttitle');
            $table->string('productdescription');
            $table->longText('serviceableevents');
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
        Schema::dropIfExists('gifts');
    }
}
