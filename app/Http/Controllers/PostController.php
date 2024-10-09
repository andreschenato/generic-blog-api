<?php

namespace App\Http\Controllers;

use App\Filters\PostFilter;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $filter = new PostFilter();
        $filterItems = $filter->transform($request);

        $includeComments = $request->query("includeComments");

        $posts = Post::where(column: $filterItems);

        if ($includeComments) {
            $posts = $posts->with("comments");
        }

        return new PostCollection($posts->paginate()->appends($request->query()));
    }

    public function store(StorePostRequest $request)
    {
        return new PostResource(Post::create($request->all()));
    }

    public function show(Post $post)
    {
        $includeComments = request()->query("includeComments");
        if($includeComments) {
            return new PostResource($post->loadMissing("comments"));
        }
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
