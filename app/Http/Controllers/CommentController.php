<?php

namespace App\Http\Controllers;

use App\Filters\CommentFilter;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $filter = new CommentFilter();
        $filterItems = $filter->transform($request);

        $comments = Comment::where(column: $filterItems);

        return new CommentCollection($comments->paginate()->appends($request->all()));
    }

    public function store(StoreCommentRequest $request)
    {
        return new CommentResource(Comment::create($request->all()));
    }

    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->all());
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response(status:204);
    }
}
