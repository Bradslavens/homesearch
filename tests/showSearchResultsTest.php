<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Property;
use App\Image;

class showSearchResultsTest extends TestCase
{
    use DatabaseMigrations;

    public function testShowSearchResultsZipCode()
    {
        $property = factory(Property::class)->create();

        $image = factory(Image::class)->create(['property_id' => $property->L_ListingID]);

        $image = Image::find($image->id);

        $property->images()->save($image);

        $this->visitRoute('listing.index', ['propertyQuery' => '92109', 'priceLow' => 0, 'priceHigh' => 9999999999, 'bedrooms' => 0, 'bathrooms' => 0])
            ->see($property->L_Zip);
    }

    public function testShowSearchResultsMLS()
    {
        $property = factory(Property::class)->create();

        $image = factory(Image::class)->create(['property_id' => $property->L_ListingID]);

        $image = Image::find($image->id);

        $property->images()->save($image);

        $this->visitRoute('listing.index', ['propertyQuery' => $property->L_ListingID, 'priceLow' => 0, 'priceHigh' => 9999999999, 'bedrooms' => 0, 'bathrooms' => 0])
            ->see($property->L_Zip);
    }


    public function testShowSearchResultsOther()
    {
        $property = factory(Property::class)->create();

        $image = factory(Image::class)->create(['property_id' => $property->L_ListingID]);

        $image = Image::find($image->id);

        $property->images()->save($image);

        $this->visitRoute('listing.index', ['propertyQuery' => $property->FullAddress, 'priceLow' => 0, 'priceHigh' => 9999999999, 'bedrooms' => 0, 'bathrooms' => 0 ])
            ->see($property->L_Zip);
    }
}
