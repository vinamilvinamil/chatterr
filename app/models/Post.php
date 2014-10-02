<?php

class Post extends Eloquent
{
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function topic()
    {
        return $this->belongsTo('Topic');
    }

}