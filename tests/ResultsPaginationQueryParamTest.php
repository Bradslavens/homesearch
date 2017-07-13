<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Property;
use App\Image;

class ResultsPaginationQueryParamTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetRequestQueryParams()
    {
        $properties = factory(Property::class, 10)->create(['FullAddress' => '123 Main']);

        $properties = Property::all();

        foreach ($properties as $property) 
        {
            $image = factory(Image::class)->create(['property_id' => $property->L_ListingID]);

            $image = Image::find($image->id);

            $property->images()->save($image);
        }

        $this->visit('/')
                        ->see('Slavens')
                        ->type('123 Main', 'propertyQuery')
                        ->press('SEARCH')
                        ->see('?propertyQuery=123%2BMain&amp')
                        ->see('priceLow=');
    }
}
