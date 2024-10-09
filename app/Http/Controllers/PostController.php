<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        return new PostCollection(Post::all());
    }

    public function store(StorePostRequest $request)
    {
        return new PostResource(Post::create($request->all()));
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response(status: 204);
    }
}
