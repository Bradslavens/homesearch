<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApplicantTest extends TestCase
{
    use DatabaseMigrations;

    public function testApplicationCreate()
    {
        $this->visit(route('apply.create'))
            ->see('Apply');
    }

    public function testApplicationStore()
    {
        $this->visit(route('apply.create'))
            ->type('Taylor','name')
            ->type('01222222','licenseNumber')
            ->type('619-555-5555','phone')
            ->type('b@example.com','email')
            ->type('agent','position')
            ->press('Apply')
            ->see('Thank You');
    }

    public function testStoreApplicant()
    {
        $response = $this->call('POST', route('apply.store'), ['name' => 'Taylor', 'licenseNumber' => '0122222', 'phone' => '555-555-5555', 'email' => 'b@example.com', 'position' => 'agent']);

        $this->assertEquals(200, $response->status());
    }
}
