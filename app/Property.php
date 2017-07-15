<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
                'L_ListingID', 
                'L_AskingPrice', 
                'L_AddressNumber', 
                'L_AddressDirection', 
                'L_AddressStreet', 
                'L_Address2', 
                'L_City', 
                'L_State', 
                'L_Zip', 
                'FullAddress', 
                'LM_Int1_3', 
                'LM_Int2_3', 
                'LM_Int1_5', 
                'LM_Int4_1', 
                'L_UpdateDate', 
                'L_ListingDate', 
                'L_Status', 
                'LM_Char10_1', 
                'L_StatusCatID',
                'LFD_Terms_42',
                'LR_remarks11',
                'LM_Char10_6',
                'LM_Char10_11',
                'LM_Char10_15',
                'LM_Char50_5',
                'LM_Int1_8',
                'LM_Int2_1',
                'LM_Int4_7',
                'LM_Int4_8',
                'LM_Int4_16',
                'LM_Dec_3',
                'LM_Dec_4',
                'LM_Dec_6',
                'LFD_Cooling_3',
                'LFD_Equipment_4',
                'LFD_LaundryLocation_15',
                'LFD_Pool_25',
                'LFD_SchoolDistrict_32',
                'LFD_View_44',
                'LFD_PropertyCondition_305', 
                'LM_Int2_3',
                'LM_Int2_6',
            ];
    
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
