<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vendor;

class Videography extends Model
{
	protected $fillable = [
       'videocode','vendorcode','vendorproductcode','typeofvideography', 'styleofshoot', 'typeofshoot', 'producttitle', 'productdescription', 'serviceableevents','pricing','productprice', 'ratevariationpercentage', 'servicecharge', 'productimageupload','createdby', 'updatedby','status'
    ];
    protected $table = 'videography';

    public function vendor(){
        return $this->hasOne(Vendor::class,'vendorcode','vendorcode');
    }
}
