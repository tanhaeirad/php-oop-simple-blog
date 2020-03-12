<?php


namespace App\Contracts;


interface AuthInterface
{
    public static function login($user,$remember = false);
    public static function check();
    public static function logout();
    public static function user();
}