<?php


namespace App\Contracts;


interface DataInterface
{
    public function exits($key);
    public function get($key);
    public function set($key,$value);
    public function forget($key);
}