<?php

use App\PropertyList;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class getPropertyListTest extends TestCase
{
    /**
     * test if we can get a property list
     * based on seaarch criteria
     *
     * @return void
     */
    public function testGetPropertyListBasedOnSearchCriteria()
    {
        // set up the data
        
        $fullPropertyList =  factory(PropertyList::class, 10)->create();

    }
}
