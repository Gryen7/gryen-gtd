<?php

namespace App\Http\Controllers\Api;

use App\Tag;
use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class ArticlesController extends Controller
{
    /**
     * 获取关联文章.
     * @param $articleId
     * @return array
     */
    public function moreArticles($articleId)
    {
        $theArticle = Article::find($articleId);
        $tags = explode(',', $theArticle->tags);
        $articles = $this->getArticlesByTags($tags)
            ->diff(collect([$theArticle]));

        if ($articles->count() < 3) {
            $articles = null;
        } else {
            $articles = $articles->random(3)
                ->map(function ($article) {
                    $article->cover = imageView2($article->cover, ['w' => '672', 'h' => '450']);
                    $article->href = action('ArticlesController@show', ['id' => $article->id]);

                    return collect($article)->only(['id', 'title', 'cover', 'href']);
                });
        }

        return $articles;
    }

    /**
     * 通过 tags 获取文章.
     * @param array $tags
     * @return Collection
     */
    private function getArticlesByTags(array $tags)
    {
        $articles = new Collection();
        $tagsWithArticles = Tag::whereIn('name', $tags)->with('article')->get();

        foreach ($tagsWithArticles as $tagsObj) {
            $articles = $articles->merge($tagsObj->article);
        }

        return $articles;
    }
}
