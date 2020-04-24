<?php

namespace Laratube\Http\Controllers;

use Laratube\Video;
use Laratube\Comment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VoteController extends Controller
{
    public function vote($entityId, $type)
    {
        $entity = $this->getEntity($entityId);

        return auth()->user()->toggleVote($entity, $type);
    }

    public function getEntity($entityId)
    {
        $video = Video::find($entityId);

        if ($video = Video::find($entityId)) {
            return $video;
        }

        if ($comment = Comment::find($entityId)) {
            return $comment;
        }

        throw new ModelNotFoundException("Entity not found");
    }
}
