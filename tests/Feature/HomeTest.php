<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function testIndex()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSeeText('Gryen-GTD');
    }

//    public function testNav()
//    {
//        $this->assertSeeText('');
//    }
}
