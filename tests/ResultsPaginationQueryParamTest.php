<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Property;

class ResultsPaginationQueryParamTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetRequestQueryParams()
    {
        $property = factory(Property::class, 10)->create(['FullAddress' => '123 Main']);

        $this->visit('/')
                        ->see('Slavens')
                        ->type('123 Main', 'propertyQuery')
                        ->press('SEARCH')
                        ->see('?propertyQuery=123%2BMain&amp');
    }
}
