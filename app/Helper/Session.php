<?php


namespace App\Helper;


use App\Contracts\DataInterface;

class Session implements DataInterface
{

    public function exits($key)
    {
        return key_exists($key, $_SESSION);
    }

    public function get($key)
    {
        return $this->exits($key) ? $_SESSION[$key] : false;
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function forget($key)
    {
        unset($_SESSION[$key]);
    }
}