<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContactTest extends TestCase
{
    use DatabaseMigrations;

    public function testAddContact()
    {
        $this->visit(route('contact.create'))
            ->type('Tony Smith', 'name')
            ->type('b@example.com', 'email')
            ->type('hello there', 'comment')
            ->press('Send')
            ->see('Thank You');
    }
}
