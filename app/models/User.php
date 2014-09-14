<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;
    public $timestamps = true;

    public function topics()
    {
        return $this->hasMany('Topic');
    }

    public function posts()
    {
        return $this->hasMany('Post');
    }

    public function avatars()
    {
        return $this->hasOne('Avatar');
    }

}