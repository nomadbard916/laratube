<?php

namespace Laratube\Http\Controllers;

use Laratube\Video;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Video $video)
    {
        return $video->comments()->paginate(10);
    }
}
