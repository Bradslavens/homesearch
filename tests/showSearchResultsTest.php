<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Property;

class showSearchResultsTest extends TestCase
{
    use DatabaseMigrations;

    public function testShowSearchResultsZipCode()
    {
        $property = factory(Property::class)->create();

        $this->visit(route('listing.index'), ['propertyQuery' => '92109'])
            ->see('92109');
    }

    public function testShowSearchResultsMLS()
    {
        $property = factory(Property::class)->create();

        $this->visit(route('listing.index'), ['propertyQuery' => $property->L_ListingID])
            ->see('92109');
    }


    public function testShowSearchResultsOther()
    {
        $property = factory(Property::class)->create();

        $this->visit(route('listing.index'), ['propertyQuery' => $property->FullAddress])
            ->see('92109');
    }
}
