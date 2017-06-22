<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CareersTest extends TestCase
{    
    public function testCareersPage ()
    {
        $this->visit(route('careers'))
            ->see('Careers');
    }
}
