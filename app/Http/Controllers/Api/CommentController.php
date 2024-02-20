<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewComment;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'author' => 'string|nullable|max:50',
            'content' => 'string|required|max:500',
            'project_id' => 'required|exists:projects,id'
        ]);

        $comment = new Comment();
        $comment->author = $data['author'];
        $comment->content = $data['content'];
        $comment->project_id = $data['project_id'];
        $comment->save();

        Mail::to('simone@king.com')->send(new NewComment($comment));

        return response()->json([
            'results' => $comment
        ]);
    }
}
