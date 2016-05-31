<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use App\Http\Requests\CreateCommentRequest;

class CommentsController extends Controller
{
    /**
     * 创建一条评论
     * @param Requests\CreateArticleRequest|CreateCommentRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateCommentRequest $request)
    {
        Comment::create($request->all());
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
