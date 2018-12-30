<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleTest extends TestCase
{
    public function testArticles()
    {
        $this->get('/articles')
            ->assertStatus(200);
    }

    public function testShow()
    {
        $this->get('/articles')
            ->assertStatus(200);
    }
}
