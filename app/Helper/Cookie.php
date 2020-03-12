<?php


namespace App\Helper;


use App\Contracts\DataInterface;

class Cookie implements DataInterface
{

    public function exits($key)
    {
        return key_exists($key,$_COOKIE);
    }

    public function get($key)
    {
        return $this->exits($key) ? $_COOKIE[$key] : false;
    }

    public function set($key, $value, $time = '+30 day')
    {
        setcookie($key,$value,strtotime($time),'/');
    }

    public function forget($key)
    {
        setcookie($key,'',strtotime("-5 day"),'/');
    }
}