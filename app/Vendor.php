<?php

namespace App;

use App\Notifications\VendorResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id','created_at','updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new VendorResetPassword($token));
    }

    public function vendortypename(){
        return $this->hasOne(Vendortype::class, 'id', 'vendortype');
    }

    public function decoration(){
        return $this->hasMany(Decoration::class, 'vendorcode', 'vendorcode');
    }

    public function videography(){
        return $this->hasMany(Videography::class, 'vendorcode', 'vendorcode');
    }

    public function makeup(){
        return $this->hasMany(Makeup::class, 'vendorcode', 'vendorcode');
    }

    public function grooming(){
        return $this->hasMany(Grooming::class, 'vendorcode', 'vendorcode');
    }

    public function choreo(){
        return $this->hasMany(Choreographer::class, 'vendorcode', 'vendorcode');
    }

    public function music(){
        return $this->hasMany(Music::class, 'vendorcode', 'vendorcode');
    }

    public function photography(){
        return $this->hasMany(Photography::class, 'vendorcode', 'vendorcode');
    }


    public function gift(){
        return $this->hasMany(Gift::class, 'vendorcode', 'vendorcode');
    }


    public function bridalwear(){
        return $this->hasMany(Bridalwear::class, 'vendorcode', 'vendorcode');
    }

    public function dj(){
        return $this->hasMany(Dj::class, 'vendorcode', 'vendorcode');
    }

    public function venues(){
        return $this->hasMany(venue::class, 'vendorcode', 'vendorcode');
    }

    public function catering(){
        return $this->hasMany(catering::class, 'vendorcode', 'vendorcode');
    }
}
