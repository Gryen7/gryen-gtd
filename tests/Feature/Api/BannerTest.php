<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BannerTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp()
    {
        parent::setUp();

        factory(\App\Article::class, 5)
            ->create()
            ->each(function ($article) {
                factory(\App\Banner::class)->create([
                    'article_id' => $article->id,
                    'weight' => $article->id
                ]);
            });
        
        $this->user = factory(\App\User::class)->create();
    }

    public function testSet()
    {
        $article = \DB::table('articles')->first();

        $postData = [
            'article_id' => $article->id,
            'cover' => env('SITE_DEFAULT_IMAGE'),
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.\JWTAuth::fromUser($this->user)
        ])->postJson('/api/banners/set', $postData);

        $response->assertOk();

        $banner = \DB::table('banners')
            ->orderBy('weight', 'desc')
            ->first();

        $this->assertTrue($banner->article_id === $article->id);
    }

    public function testDelete()
    {
        $banner = \DB::table('banners')
            ->first();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.\JWTAuth::fromUser($this->user)
        ])->delete('/api/banners/delete/'.$banner->id);

        $response->assertOk();

        $banner = \DB::table('banners')
            ->find($banner->id);

        $this->assertNull($banner);
    }

    public function testTop()
    {
        $banner = \DB::table('banners')
            ->orderBy('weight', 'asc')
            ->first();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.\JWTAuth::fromUser($this->user)
        ])->post('/api/banners/top/'.$banner->id);

        $response->assertOk();

        $banner = \DB::table('banners')->find($banner->id);
        $maxWeight = \DB::table('banners')->max('weight');

        $this->assertTrue($banner->weight === $maxWeight);
    }
}
