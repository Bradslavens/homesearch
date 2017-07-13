<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class homePageTest extends TestCase
{
    use DatabaseMigrations;
    
    public function testHomePage()
    {
        $this->visit('/')
            ->see("Slavens Realty")
            ->see('search');
    }
}
