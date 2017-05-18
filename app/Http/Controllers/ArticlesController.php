<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Http\Requests\CreateArticleRequest;
use App\Tag;
use App\File;
use App\Config;
use Illuminate\Support\Facades\Input;

class ArticlesController extends Controller
{
    /**
     * 文章列表页
     * @return \Illuminate\Http\Response
     * @internal param Article $article
     */
    public function index()
    {
        $articles = Article::where('status', '>', 0)
            ->orderBy('created_at', 'desc')
            ->paginate(7);

        foreach ($articles as &$article) {
            if(empty($article->cover)) {
                $article->cover = Config::getAllConfig('SITE_DEFAULT_IMAGE');
            }
        }

        $articles = Article::getTagArray($articles);
        $siteTitle = '记录';
        return view('articles.index', compact('siteTitle', 'articles'));
    }

    /**
     * 新建文章页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::orderBy('num', 'desc')->take(7)->get();
        $article['cover'] = '//statics.targaryen.top/default-image.png';
        $article = (object)$article;
        return view('articles.create', compact('tags', 'article'));
    }

    /**
     * 保存新的文章
     *
     * @param CreateArticleRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param Article $article
     */
    public function store(CreateArticleRequest $request)
    {
        $resParams = $request->all();

        /* 文章描述处理 */
        $resParams['description'] = Article::descriptionProcess($request->get('content'));

        /* 创建文章 */
        $article = Article::create($resParams);

        /* 标签处理 */
        Tag::createArticleTagProcess($request->get('tags'), $article->id);

        /* 更新文章内容 */
        $article->withContent()->create([
            'content' => $request->get('content')
        ]);

        return response()->json([
            'code' => 200,
            'message' => '文章提交成功',
            'type' => 'success',
            'href' => (int)$resParams['status'] === 1 ? action('ArticlesController@show', ['id' => $article->id]) : ''
        ]);
    }


    /**
     * 上传文章封面图
     * @return array
     */
    public function cover()
    {
        $File = Input::file('cover');
        return File::upload($File);
    }

    /**
     * 文章详情页
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
        if (($article->trashed() || $article->status < 1) && !\Auth::check()) {
            return redirect('/');
        }

        $article = Article::getTagArray($article);

        $content = $article->withContent()->first()->content;
        $article->content = handleContentImage($content);

        $comments = Comment::where('article_id', $id)->get();

        $siteTitle = $article->title;
        $siteKeywords = $article->tags;
        $siteDescription = $article->description;
        return view('articles.show', compact('siteTitle', 'siteKeywords', 'siteDescription', 'article', 'comments'));
    }

    /**
     * 文章编辑页
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::withTrashed()->find($id);
        $article->cover = empty($article->cover) ? '//statics.targaryen.top/default-image.png' : $article->cover;

        $content = $article->withContent()->first()->content;
        $article->content = handleContentImage($content);
        return view('articles.edit', compact('article'));
    }

    /**
     * 更新文章
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

        /* 文章描述处理 */
        $updateData['description'] = Article::descriptionProcess($request->get('content'));
        $content = handleContentImage($request->get('content'), 2);

        $article->update($updateData);

        /* 更新文章内容 */
        $article->withContent()->update([
            'content' => $content
        ]);
        return response()->json([
            'code' => 200,
            'message' => '文章更新成功',
            'type' => 'success',
            'href' => (int)$updateData['status'] === 1 ? action('ArticlesController@show', ['id' => $article->id]) : ''
        ]);
    }

    /**
     * 软删除文章
     *
     * @param $ids
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function delete($ids)
    {
        Article::destroy($ids);
        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * 彻底删除一篇文章
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $article = Article::onlyTrashed()
            ->find($id);
        $article->forceDelete();
        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * 恢复被删除的文章
     *
     * @param $ids
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore($ids)
    {
        Article::onlyTrashed()
            ->where('id', $ids)
            ->restore();
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
