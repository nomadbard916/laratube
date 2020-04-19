<?php

namespace Laratube\Http\Controllers;

use Laratube\Channel;
use Illuminate\Http\Request;

class UploadVideoController extends Controller
{
    public function index(Channel $channel)
    {
        return view('channels.upload', [
            'channel' => $channel
        ]);
    }
}
