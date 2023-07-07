<?php

namespace App\Http\Controllers\SocialMediaControllers;

use App\Http\Requests\CreateComment;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        return CommentResource::collection(Comment::all());
    }

    public function show($id)
    {
        $Comments = Comment::find($id);
        $Comments->socialmedia->id;
        $Comments->user->name;

        return response()->json([
            "Post" => $Comments,
        ]);
    }

    public function store(CreateComment $request)
    {
        $data = $request->validated();
        $comment = Comment::create($data);
        return new CommentResource($comment->fresh());
    }

    public function destroy($id)
    {
        Comment::find($id)->delete();
        return response()->json([
            "success" => true,
            "Message" => "Deleted successfully"
        ]);
    }
}
