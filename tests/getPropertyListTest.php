<?php

use App\PropertyList;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class getPropertyListTest   extends TestCase
{
    
    use DatabaseMigrations;

    /**
     * test if we can get a property list
     * based on seaarch criteria
     *
     * @return void
     */
    public function testPropertyModel()
    {
        // set up the data
        
        $fullPropertyList =  factory(\App\Property::class, 10)->create();

        $this->assertEquals($fullPropertyList[0]['id'], 1);

    }

    public function testClickListingForm()
    {
        $this->visit('/')
                ->see('Slavens')
                ->type('123 main', 'propertyQuery')
                ->press('SEARCH')
                ->seePageIs('http://localhost/listing?propertyQuery=123%20main');

    }

    public function testShowListingsBaseOnSearchCriteria()
    {
        $listings = factory(\App\Property::class)->create(['L_ListingID' => "00123456", 'L_Zip' => "92123"]);

        // test mls number
        $result = $listings = \App\Property::where('L_ListingID', 'like', "%00123456%")->get();

        $this->assertEquals("00123456", $result[0]->L_ListingID);

        // test zip code
        // 
        $result = $listings = \App\Property::where('L_Zip', 'like', "%9212%")->get();

        $this->assertEquals("92123", $result[0]->L_Zip);
        
        // test street code
        // 
        $result = $listings = \App\Property::where('L_Zip', 'like', "%9212%")->get();

        $this->assertEquals("92123", $result[0]->L_Zip);
        

    }
}
