<?php

namespace Laratube;


class Comment extends Model
{
    protected $with = ['user', 'votes'];
    protected $appends = ['repliesCount'];

    public function votes()
    {
        return $this->morphMany(Vote::class, 'voteable');
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'comment_id')->whereNotNull('comment_id');
    }

    public function getRepliesCountAttribute()
    {
        return $this->replies->count();
    }
}
