<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

class ArticleTest extends TestCase
{
    public function testMoreArticles()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSeeText(env('APP_NAME'));
    }

    public function testGetArticlesByTags()
    {
        $this->assertTrue(true);
    }

    public function testGetList()
    {
        $this->assertTrue(true);
    }

    public function testDelete()
    {
        $this->assertTrue(true);
    }

    public function testRestore()
    {
        $this->assertTrue(true);
    }

    public function testForceDelete()
    {
        $this->assertTrue(true);
    }
}
