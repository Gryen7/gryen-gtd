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

    }

    public function testGetList()
    {

    }

    public function testDelete()
    {

    }

    public function testRestore()
    {

    }

    public function testForceDelete()
    {

    }
}
