<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vendor;

class Caterings extends Model
{
    public $guarded = ['id', 'created_at', 'updated_at'];

    public function vendor(){
        return $this->hasOne(Vendor::class,'vendorcode','vendorcode');
    }
}
