<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddPropertyTest extends TestCase
{
    use DatabaseMigrations;

    public function testAddProperty()
    {
        $property = factory(\App\Property::class)->create();

        for($i = 0; $i < 4; $i++)
        {
            factory(\App\Image::class)->create(['property_id' => $property['id']]);
        }

        $images = \App\Property::find($property['id'])->images;

        $this->assertEquals($images[0]->property_id, $property['id']);
    }
}
