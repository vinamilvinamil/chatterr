<?php

class Image extends Eloquent
{
    public $timestamps = false;

    public function imageable()
    {
        return $this->morphTo();
    }

}