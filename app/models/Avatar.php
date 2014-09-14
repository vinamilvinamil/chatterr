<?php

class Avatar extends Eloquent
{
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('User');
    }
    
}