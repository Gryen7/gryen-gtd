<?php

namespace Tests\Feature\Api;

use Carbon\Carbon;
use Tests\TestCase;

class ArticleTest extends TestCase
{

    private $firstArticle;
    private $user;
    private static $COUNT = 3;

    protected function setUp()
    {
        parent::setUp();

        factory(\App\Article::class, 1)
            ->create()
            ->each(function ($article) {
                $article->withContent()->save(factory(\App\ArticleData::class)->make());
                \App\Tag::createArticleTagProcess($article->tags, $article->id);
            });

        $this->firstArticle = \DB::table('articles')->first();
        
        factory(\App\Article::class, self::$COUNT)
            ->create([
                'tags' => $this->firstArticle->tags
            ])
            ->each(function ($article) {
                $article->withContent()->save(factory(\App\ArticleData::class)->make());
                \App\Tag::createArticleTagProcess($article->tags, $article->id);
            });

        $this->user = factory(\App\User::class)->create();
    }

    public function testMoreArticles()
    {
        $response = $this->withHeader('Authorization', 'Bearer '.\JWTAuth::fromUser($this->user))
            ->getJson('/api/articles/list/'.$this->firstArticle->id);

        $response->assertSuccessful()
            ->assertJsonCount(self::$COUNT);
    }

    public function testGetList()
    {
        $response = $this->withHeader('Authorization', 'Bearer '.\JWTAuth::fromUser($this->user))
            ->getJson('/api/articles/list');

        $response->assertSuccessful();
    }

    public function testDelete()
    {
        $response = $this->withHeader('Authorization', 'Bearer '.\JWTAuth::fromUser($this->user))
            ->post('/api/articles/delete', ['ids' => [$this->firstArticle->id]]);

        $response->assertSuccessful();

        $article = \DB::table('articles')
            ->find($this->firstArticle->id);

        $this->assertTrue(!empty($article) && !empty($article->deleted_at));
    }

    public function testRestore()
    {
        $response = $this->withHeader('Authorization', 'Bearer '.\JWTAuth::fromUser($this->user))
            ->post('/api/articles/restore', ['id' => $this->firstArticle->id]);
        $response->assertSuccessful();

        $article = \DB::table('articles')
            ->find($this->firstArticle->id);

        $this->assertTrue(!empty($article) && empty($article->deleted_at));
    }

    public function testForceDelete()
    {
        \DB::table('articles')
            ->where('id', $this->firstArticle->id)
            ->update([
                'deleted_at' => Carbon::now()
            ]);

        $response = $this->withHeader('Authorization', 'Bearer '.\JWTAuth::fromUser($this->user))
            ->post('/api/articles/forcedelete', ['id' => $this->firstArticle->id]);

        $response->assertSuccessful();

        $article = \DB::table('articles')
            ->find($this->firstArticle->id);
        
        $this->assertTrue(empty($article));
    }
}
