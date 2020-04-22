<?php

namespace Laratube;

use Laratube\Channel;


class Video extends Model
{
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
