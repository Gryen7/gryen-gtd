<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHome()
    {
        $this->visit('/')
            ->see('生活');
    }

    public function testNav()
    {
        $this->visit('/')
            ->click('生活')
            ->seePageIs('/');

        $this->visit('/')
            ->click('记录')
            ->seePageIs('/articles');
    }
}
