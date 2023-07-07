<?php

namespace App\Http\Controllers\SocialMediaControllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::latest()->get());
    }

    public function show($id)
    {
        $postandcomments = Post::find($id);
        $postandcomments->user->name;
        return response()->json([
            "Post" => $postandcomments,

        ]);
    }

    public function store(CreatePostRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('AttSm')) {
            $image = $request->AttSm;
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/Post', $name);
            $data['AttSm'] = $name;
            $post = Post::create($data);
        } else {
            $post = Post::create($data);
        }
        return new PostResource($post);
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return response()->json([
            "success" => true,
            "Message" => "Deleted successfully"
        ]);
    }
}
