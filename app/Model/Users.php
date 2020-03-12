<?php namespace App\Model;


use HighIdeas\UsersOnline\Traits\UsersOnlineTrait;

class Users extends DB
{
    use UsersOnlineTrait;
    protected $table = 'Users';
}