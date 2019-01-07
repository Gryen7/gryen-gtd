<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function testIndex()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSeeText('与其波流茅靡，不如从容燃烧。');
    }

    public function testNav()
    {
        $this->assertTrue(true);
    }
}
