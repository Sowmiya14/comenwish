<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendortype extends Model
{
    protected $fillable = ['vendortypecode','typename','status','createdby','updatedby'];

    protected $table = 'vendortype';


}
