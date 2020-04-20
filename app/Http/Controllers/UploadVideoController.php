<?php

namespace Laratube\Http\Controllers;

use Laratube\Channel;
use Illuminate\Http\Request;
use Laratube\Jobs\Videos\ConvertForStreaming;

class UploadVideoController extends Controller
{
    public function index(Channel $channel)
    {
        return view('channels.upload', [
            'channel' => $channel
        ]);
    }

    public function store(Channel $channel)
    {
        // return $channel->videos()->create([
        //     'title' => request()->title,
        //     'path' => request()->video->store("channels/{$channel->id}")
        // ]);
        $video = $channel->videos()->create([
            'title' => request()->title,
            'path' => request()->video->store("channels/{$channel->id}")
        ]);

        $this->dispatch(new ConvertForStreaming($video));

        return $video;
    }
}
