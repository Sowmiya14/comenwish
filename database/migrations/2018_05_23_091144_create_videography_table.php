<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideographyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videography', function (Blueprint $table) {
            $table->increments('id');
            $table->string('videocode');
            $table->string('vendorcode');
            $table->string('vendorproductcode');
            $table->string('typeofvideography');
            $table->string('styleofshoot');
            $table->string('typeofshoot');
            $table->string('producttitle');
            $table->string('productdescription');
            $table->longText('serviceableevents');
            $table->string('pricing');
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
        Schema::dropIfExists('videography');
    }
}
