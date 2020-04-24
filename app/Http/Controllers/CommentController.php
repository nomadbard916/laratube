<?php

namespace Laratube\Http\Controllers;

use Laratube\Video;
use Laratube\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Video $video)
    {
        return $video->comments()->paginate(10);
    }

    public function show(Comment $comment)
    {
        return $comment->replies()->paginate(10);
    }
}
