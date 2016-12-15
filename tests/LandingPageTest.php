<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LandingPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHome()
    {
        $this->visit('/')
            ->see('Slavens Realty');
    }

    public function testForm()
    {
        $this->visit('/')
            ->press('Search')
            ->seePageIsI('searchResults');
    }

}
