<?php

namespace App\Http\Controllers;

use App\Article;
use App\Config;
use App\Events\PublishArticle;
use App\File;
use App\Http\Requests\CreateArticleRequest;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;

class ArticlesController extends Controller
{
    /**
     * 文章列表页.
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @internal param Article $article
     */
    public function index()
    {
        $articles = Article::where('status', '>', 0)
            ->orderBy('created_at', 'desc')
            ->paginate(env('ARTICLE_PAGE_SIZE'));

        foreach ($articles as &$article) {
            if (empty($article->cover)) {
                $article->cover = Config::getAllConfig('SITE_DEFAULT_IMAGE');
            }
        }

        return view('articles.index', compact('articles'));
    }

    /**
     * @param $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tag($tag)
    {
        $tag = Tag::where('name', $tag)
            ->first();

        $articles = empty($tag) ? (object) [] : $tag->article()
            ->where('status', '>', 0)
            ->orderBy('created_at', 'desc')
            ->paginate(env('ARTICLE_PAGE_SIZE'));

        foreach ($articles as &$article) {
            if (empty($article->cover)) {
                try {
                    $article->cover = Config::getAllConfig('SITE_DEFAULT_IMAGE');
                } catch (\Exception $e) {
                    \Log::error('Get SITE_DEFAULT_IMAGE error.', $e);
                }
            }
        }

        return view('articles.index', compact('articles'));
    }

    /**
     * 新建文章页面.
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function create()
    {
        $tags = Tag::orderBy('num', 'desc')->take(7)->get();
        $article['cover'] = Config::getAllConfig('SITE_DEFAULT_IMAGE');
        $article = (object) $article;
        $bodyClassString = 'no-padding';

        return view('articles.create', compact('tags', 'article', 'bodyClassString'));
    }

    /**
     * 保存新的文章.
     *
     * @param CreateArticleRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param Article $article
     */
    public function store(CreateArticleRequest $request)
    {
        $resParams = $request->all();
        $resParams['cover'] = empty($resParams['cover']) ? env('SITE_DEFAULT_IMAGE') : $resParams['cover'];

        /* 创建文章 */
        $article = Article::create($resParams);

        /* 标签处理 */
        Tag::createArticleTagProcess($request->get('tags'), $article->id);

        /* 更新文章内容 */
        $article->withContent()->create([
            'content' => $request->get('content'),
        ]);

        event(new PublishArticle());

        $href = '';
        $status = (int) $resParams['status'];

        if ($status === 1) {
            $href = action('ArticlesController@show', ['id' => $article->id]);
        }

        if ($status === 0) {
            $href = action('ArticlesController@edit', ['id' => $article->id]);
        }

        return response()->json([
            'code' => 200,
            'message' => '文章提交成功',
            'type' => 'success',
            'href' => $href,
        ]);
    }

    /**
     * 上传文章封面图.
     * @return array
     */
    public function cover()
    {
        $File = Request::file('cover');

        return File::upload($File);
    }

    /**
     * 文章详情页.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        /* 没有数据跳转首页 */
        if (empty($article)) {
            return redirect('/');
        }

        /* 没有权限跳转首页 */
        if (($article->trashed() || $article->status < 1) && ! \Auth::check()) {
            return redirect('/');
        }

        $article = Article::getTagArray($article);

        $content = $article->withContent()->first()->content;
        $article->content = handleContentImage($content);
        $article->cover = 'https:'.$article->cover;

        $siteTitle = $article->title;
        $siteKeywords = $article->tags;
        $siteDescription = $article->description;

        $article->timestamps = false;
        $article->increment('views');

        return view('articles.show', compact('siteTitle', 'siteKeywords', 'siteDescription', 'article'));
    }

    /**
     * 文章编辑页.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function edit($id)
    {
        $article = Article::withTrashed()->find($id);
        $article->cover = empty($article->cover) ? Config::getAllConfig('SITE_DEFAULT_IMAGE') : $article->cover;

        $article = Article::getTagArray($article);
        $tags = Tag::orderBy('num', 'desc')->take(7)->get();
        $bodyClassString = 'no-padding';

        return view('articles.edit', compact('article', 'tags', 'bodyClassString'));
    }

    /**
     * 更新文章.
     *
     * @param  int $id
     * @param CreateArticleRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, CreateArticleRequest $request)
    {
        $article = Article::withTrashed()
            ->find($id);
        if ($article->trashed()) {
            $article->restore();
        }
        $updateData = $request->all();
        $updateData['updated_at'] = Carbon::now();

        $article->update($updateData);

        /* 更新文章内容 */
        $article->withContent()->update([
            'content' => $request->get('content'),
        ]);

        event(new PublishArticle());

        return response()->json([
            'code' => 200,
            'message' => '文章更新成功',
            'type' => 'success',
            'href' => (int) $updateData['status'] === 1 ? action('ArticlesController@show', ['id' => $article->id]) : '',
        ]);
    }

    /**
     * 软删除文章.
     *
     * @param $ids
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function delete($ids)
    {
        Article::destroy($ids);

        event(new PublishArticle());

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * 恢复被删除的文章.
     *
     * @param $ids
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore($ids)
    {
        Article::onlyTrashed()
            ->where('id', $ids)
            ->restore();

        event(new PublishArticle());

        return redirect($_SERVER['HTTP_REFERER']);
    }
}
