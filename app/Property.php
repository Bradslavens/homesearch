<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['L_ListingID'];
    
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
