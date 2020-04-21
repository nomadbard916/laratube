<?php

namespace Laratube\Http\Controllers;

use Laratube\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function show(Video $video)
    {
        return $video;
    }
}
