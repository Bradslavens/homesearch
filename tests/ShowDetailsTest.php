<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Property;
use App\Image;  

class ShowDetailsTest extends TestCase
{
    use DatabaseMigrations;

    public function testShowDetails()
    {
        $property = factory(Property::class)->create();

        $property = Property::find($property->id);

        $images = factory(Image::class, 10)->create(['property_id' => $property->L_ListingID]);

        foreach ($images as $image) 
        {
            $image = Image::find($image->id);

            $property->images()->save($image);
        }

        $this->visitRoute('listing.show', ['id' => $property->id])
            ->see($property->FullAddress);
    }
}
