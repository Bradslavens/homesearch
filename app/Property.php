<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['L_ListingID', 'L_AskingPrice', 'L_AddressNumber', 'L_AddressDirection', 'L_AddressStreet', 'L_Address2', 'L_City', 'L_State', 'L_Zip',];
    
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
