<?php

class Category extends Eloquent
{
    public $timestamps = true;

    public function topic()
    {
        return $this->belongsTo('Topic');
    }

}