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
}
