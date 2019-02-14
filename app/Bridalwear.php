<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vendor;
class Bridalwear extends Model
{
    public $guarded = ['id', 'created_at', 'updated_at'];

    protected $table = 'bridalwear';

    public function vendor(){

    	return $this->hasOne(Vendor::class,'vendorcode','vendorcode');
    }
}
