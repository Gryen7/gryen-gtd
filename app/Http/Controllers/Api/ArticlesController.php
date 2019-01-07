<?php

namespace App\Http\Controllers\Api;

use App\Tag;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    /**
     * 获取关联文章.
     */
    public function moreArticles(Request $request)
    {
        $theArticle = Article::find($request->articleId);
        $tags = explode(',', $theArticle->tags);
        $articles = $this->getArticlesByTags($tags)
            ->diff(collect([$theArticle]));

        if ($articles->count() < 3) {
            $articles = [];
        } else {
            $articles = $articles->random(3)
                ->map(function ($article) {
                    $article->cover = imageView2($article->cover, ['w' => '287', 'h' => '192']);
                    $article->href = action('ArticlesController@show', ['id' => $article->id]);

                    return collect($article)->only(['id', 'title', 'cover', 'href']);
                });
        }

        return $articles;
    }

    /**
     * 通过 tags 获取文章.
     */
    private function getArticlesByTags(array $tags)
    {
        $articles = null;
        $tagsWithArticles = Tag::whereIn('name', $tags)->with('article')->get();

        foreach ($tagsWithArticles as $tagsObj) {
            if (empty($articles)) {
                $articles = $tagsObj->article;
            } else {
                $articles->merge($tagsObj->article);
            }
        }

        return $articles;
    }
}
