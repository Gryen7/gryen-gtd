<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Http\Requests\CreateArticleRequest;
use App\Tag;
use App\TagMap;
use App\Upload;
use Illuminate\Support\Facades\Input;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     * @internal param Article $article
     */
    public function index()
    {
        $articles = Article::where('status', '>', 0)
            ->orderBy('created_at', 'desc')
            ->paginate(7);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::orderBy('num', 'desc')->take(7)->get();
        return view('articles.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateArticleRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param Article $article
     */
    public function store(CreateArticleRequest $request)
    {
        $resParams = $request->all();

        /* 标签存文章表前置处理 */
        $resParams['tags'] = '';
        // 点选的标签，tags 表中的数据
        $sTags = json_decode($request->get('stags'));
        if (!empty($sTags)) {
            foreach ($sTags as $key => $value) {
                $resParams['tags'] .= $value . ',';
            }
        }

        // 输入的标签
        $oTags = $request->get('otags');
        $resParams['tags'] .= $oTags;

        /* 文章描述处理 */
        $textContent = strip_tags($request->get('content'));
        $resParams['description'] = mb_substr($textContent, 0, 200);

        /* 处理文章封面上传 */
        $File = Input::file('cover');
        if ($File) {
            $UploadResult = Upload::upload($File);

            if ($UploadResult['success']) {
                $resParams['cover'] = $UploadResult['file_path'];
            }
        }

        $article = Article::create($resParams);

        /* 更新文章内容 */
        $article->withContent()->create([
            'content' => $request->get('content')
        ]);

        /* 处理标签与文章的关系 */
        // 输入的标签
        $oTagsArray = array_filter(explode(',', $oTags));
        foreach ($oTagsArray as $value) {
            $oTagInTable = Tag::where('name', $value);
            if ($oTagInTable->count() < 1) {
                // TAG 不存在
                $newTag = Tag::create([
                    'name' => $value
                ]);

                TagMap::create([
                    'tag_id' => $newTag->id,
                    'article_id' => $article->id
                ]);
            } else {
                // TAG 存在，判断关系是否存在，创建关系，num++
                $oTagInTable = $oTagInTable->first();
                $mapNoExisted = TagMap::where('tag_id', $oTagInTable->id)
                    ->where('article_id', $article->id)
                    ->count() < 1;
                if ($mapNoExisted) {
                    TagMap::create([
                        'tag_id' => $oTagInTable->id,
                        'article_id' => $article->id
                    ]);
                    $oTagInTable->increment('num');
                }
            }
        }

        // 点选的标签
        foreach ($sTags as $key => $value) {
            $tagInTable = Tag::find($key);

            $mapExisted = TagMap::where('tag_id', $tagInTable->id)
                    ->where('article_id', $article->id)
                    ->count() > 0;

            if (!$mapExisted) {
                TagMap::create([
                    'tag_id' => $tagInTable->id,
                    'article_id' => $article->id
                ]);
                $tagInTable->increment('num');
            }

        }

        /** @noinspection PhpUndefinedFieldInspection */
        return redirect('articles/show/' . $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        $article->content = $article->withContent()->get()[0]->content;
        $comments = Comment::where('article_id', $id)->get();
        return view('articles.show', compact('article', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::withTrashed()->find($id);
        $article->cover = empty($article->cover) ? 'http://static.targaryen.top/wallhaven-85912.jpg' : $article->cover;
        $article->content = $article->withContent()->get()[0]->content;
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
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

        /* 处理文章封面上传 */
        $File = Input::file('cover');
        if ($File) {
            $UploadResult = Upload::upload($File);

            if ($UploadResult['success']) {
                $updateData['cover'] = $UploadResult['file_path'];
            }
        }

        $article->update($updateData);

        /* 更新文章内容 */
        $article->withContent()->update([
            'content' => $request->get('content')
        ]);
        return redirect('articles/show/' . $id);
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
