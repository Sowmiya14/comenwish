<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('id');
            $table->string('vendorcode', 100)->unique();
            $table->string('ownername');
            $table->string('email', 100)->unique();
            $table->string('mobilenumber', 20);
            $table->longText('profilepicture');
            $table->string('contactpersonname1');
            $table->string('contactpersonmobileno1', 20);
            $table->string('contactpersonname2')->nullable();
            $table->string('contactpersonmobileno2', 20)->nullable();
            $table->string('password');
            $table->string('businessname');
            $table->longText('businesslogo');
            $table->string('vendortype');
            $table->string('gstnumber');
            $table->string('businesslocation');
            $table->string('serviceablearea');
            $table->string('phonenumberverified')->default('0');
            $table->string('status');
            $table->boolean('verified')->default('0');
            $table->string('createdby');
            $table->string('updatedby');
            $table->rememberToken();
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
        Schema::drop('vendors');
    }
}