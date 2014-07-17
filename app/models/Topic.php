<?php

class Topic extends Eloquent
{
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function categories()
    {
        return $this->hasOne('Category');
    }

    public function posts()
    {
        return $this->hasMany('Post');
    }

}