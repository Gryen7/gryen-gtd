<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    private $articles;
    private $firstArticle;
    private $user;

    public function setUp()
    {
        parent::setUp();

        $this->articles = factory(\App\Article::class, 5)
            ->create()
            ->each(function ($article) {
                $article->withContent()->save(factory(\App\ArticleData::class)->make());
                \App\Tag::createArticleTagProcess($article->tags, $article->id);
            });

        $this->firstArticle = $this->articles->first();
        $this->user = factory(\App\User::class)->create();
    }

    public function testArticlesPage()
    {
        $this->get('/articles')
            ->assertOk()
            ->assertSeeText($this->firstArticle->title)
            ->assertSeeText($this->firstArticle->description);
    }

    public function testTagPage()
    {
        $tags = $this->firstArticle->getTagArray($this->firstArticle);

        $this->get('/articles/tag/'.$tags->tagArray[0])
            ->assertOk()
            ->assertSeeText($this->firstArticle->title);
    }

    public function testArticleShowPage()
    {
        $this->get('/articles/show/'.$this->firstArticle->id.'.html')
            ->assertOk()
            ->assertSeeText($this->firstArticle->title)
            ->assertSeeText($this->firstArticle->withContent()->first()->content);
    }

    public function testCreateArticlePage()
    {
        $this->actingAs($this->user)
            ->get('/articles/create')
            ->assertOk();
    }

    public function testEditArticlePage()
    {
        $this->actingAs($this->user)
            ->get('/articles/edit/'.$this->firstArticle->id)
            ->assertOk();
    }

    public function testStoreArticle()
    {
        $faker = \Faker\Factory::create();
        $postData = [
            'title' => $faker->text(),
            'content' => $faker->text(),
            'cover' => env('SITE_DEFAULT_IMAGE'),
            'description' => $faker->text(),
            'tags' => implode(',', $faker->words()),
            'status' => 1,
        ];

        $response = $this->actingAs($this->user)
            ->postJson('/articles/store', $postData);

        $response->assertOk();

        $tagArray = array_filter(explode(',', $postData['tags']));

        $this->get($response->original['href'])
            ->assertSeeText($postData['title'])
            ->assertSeeText($postData['content'])
            ->assertSeeText($tagArray[0])
            ->assertOk();
    }

    public function testUpdateArticle()
    {
        $faker = \Faker\Factory::create();
        $postData = [
            'title' => $faker->text(),
            'content' => $faker->text(),
            'cover' => env('SITE_DEFAULT_IMAGE'),
            'description' => $faker->text(),
            'tags' => implode(',', $faker->words()),
            'status' => 1,
        ];

        $response = $this->actingAs($this->user)
            ->postJson('/articles/update/'.$this->firstArticle->id, $postData);

        $response->assertOk();

        $tagArray = array_filter(explode(',', $postData['tags']));

        $this->get($response->original['href'])
            ->assertSeeText($postData['title'])
            ->assertSeeText($postData['content'])
            ->assertSeeText($tagArray[0])
            ->assertOk();
    }

    public function testUploadCover()
    {
        Storage::fake(env('DISK'));

        $response = $this->actingAs($this->user)
            ->post('/articles/cover/upload', [
                'cover' => UploadedFile::fake()->image('cover.jpg')->size(200),
            ]);

        $response->assertOk()
            ->assertJson([
                'success' => true,
            ]);

        $filePathArr = explode(env('STATIC_URL'), $response->json('file_path'));

        Storage::disk(env('DISK'))->assertExists($filePathArr[1]);
    }
}
