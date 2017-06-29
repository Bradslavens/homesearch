<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['L_ListingID', 'L_AskingPrice', 'L_AddressNumber', 'L_AddressDirection', 'L_AddressStreet', 'L_Address2', 'L_City', 'L_State', 'L_Zip', 'FullAddress', 'LM_Int1_3', 'LM_Int2_3', 'LM_Int1_5', 'LM_Int4_1', 'L_UpdateDate', 'L_ListingDate', 'L_StatusCatID',  ];
    
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
