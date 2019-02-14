<?php

use Illuminate\Database\Seeder;

class VendorProductMaster extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendorproductmasters')->truncate();
        DB::table('vendorproductmasters')->insert(array
        (
            array('vendorproductcode'=>'vendorproduct_1','vendorproductname'=>'venues','vendorgroup'=>'1','productpercentage'=>'2','createdby'=>'1','updatedby'=>'1'),
            array('vendorproductcode'=>'vendorproduct_2','vendorproductname'=>'Caterings','vendorgroup'=>'1','productpercentage'=>'2','createdby'=>'1','updatedby'=>'1'),
            array('vendorproductcode'=>'vendorproduct_3','vendorproductname'=>'Photography ','vendorgroup'=>'1','productpercentage'=>'2','createdby'=>'1','updatedby'=>'1'),
            array('vendorproductcode'=>'vendorproduct_4','vendorproductname'=>'Videography ','vendorgroup'=>'1','productpercentage'=>'2','createdby'=>'1','updatedby'=>'1'),
            array('vendorproductcode'=>'vendorproduct_5','vendorproductname'=>'Makeup','vendorgroup'=>'1','productpercentage'=>'2','createdby'=>'1','updatedby'=>'1'),
            array('vendorproductcode'=>'vendorproduct_6','vendorproductname'=>'Grooming','vendorgroup'=>'1','productpercentage'=>'2','createdby'=>'1','updatedby'=>'1'),
            array('vendorproductcode'=>'vendorproduct_7','vendorproductname'=>'Decoration ','vendorgroup'=>'1','productpercentage'=>'2','createdby'=>'1','updatedby'=>'1'),
            array('vendorproductcode'=>'vendorproduct_8','vendorproductname'=>'DJ ','vendorgroup'=>'1','productpercentage'=>'2','createdby'=>'1','updatedby'=>'1'),
            array('vendorproductcode'=>'vendorproduct_9','vendorproductname'=>'SangeethChoreographers ','vendorgroup'=>'1','productpercentage'=>'2','createdby'=>'1','updatedby'=>'1'),
            array('vendorproductcode'=>'vendorproduct_10','vendorproductname'=>'Music','vendorgroup'=>'1','productpercentage'=>'2','createdby'=>'1','updatedby'=>'1'),
            array('vendorproductcode'=>'vendorproduct_11','vendorproductname'=>'Cakes ','vendorgroup'=>'1','productpercentage'=>'2','createdby'=>'1','updatedby'=>'1'),
            array('vendorproductcode'=>'vendorproduct_12','vendorproductname'=>'Transport ','vendorgroup'=>'1','productpercentage'=>'2','createdby'=>'1','updatedby'=>'1'),
            array('vendorproductcode'=>'vendorproduct_13','vendorproductname'=>'Gift Compliments ','vendorgroup'=>'1','productpercentage'=>'2','createdby'=>'1','updatedby'=>'1'),
             array('vendorproductcode'=>'vendorproduct_14','vendorproductname'=>'Bridalwear ','vendorgroup'=>'1','productpercentage'=>'2','createdby'=>'1','updatedby'=>'1'),

        )
    );

    }
}
