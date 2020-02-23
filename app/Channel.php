<?php

namespace Laratube;

use Laratube\Model;



class Channel extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
