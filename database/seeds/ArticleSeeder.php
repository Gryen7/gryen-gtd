<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Article::class, 30)
            ->create()
            ->each(function ($article) {
                $article->withContent()->save(factory(\App\Models\ArticleData::class)->make());

                \App\Models\Tag::createArticleTagProcess($article->tags, $article->id);
            });
    }
}
