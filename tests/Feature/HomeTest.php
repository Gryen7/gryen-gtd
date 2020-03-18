<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function testIndex()
    {
        $this->get('/')
            ->assertSuccessful()
            ->assertSeeText(env('APP_NAME'));
    }
}
