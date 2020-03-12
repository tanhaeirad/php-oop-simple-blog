<?php


namespace App\Helper;


use App\Contracts\AuthInterface;
use App\Model\Users;

class Auth implements AuthInterface
{

    public static function login($user, $remember = false)
    {
        session()->set('email', $user->email);
        if ($remember == true) {
            $remember_token = random(240);
            (new Users())->update($user->id, [
                'remember_token' => $remember_token
            ]);
            cookie()->set('remember_token', $remember_token);
        }
    }

    public static function check()
    {
        if (session('email')) {
            $user = (new Users())->find('email', session('email'));
            if ($user) return true;
            else session()->forget('email');
        } elseif (cookie()->exits('remember_token')){
            $user =(new Users())->find('remember_token',cookie('remember_token'));
            if ($user) {
                session()->set('email',$user->email);
                return true;
            }
        }
        return false;
    }

    public static function logout()
    {
        if (cookie()->exits('remember_token')){
            cookie()->forget('remember_token');
        }
        session()->forget('email');
    }

    public static function user()
    {
        return (new Users())->find('email',session('email'));
    }
}