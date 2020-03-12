<?php

use App\Helper\Auth;
use App\Model\Users;


function old($field)
{
    return request($field);
}


function request($field = null)
{
    $request = new \App\Helper\Request();
    if (is_null($field))
        return $request;

    return $request->input($field);
}

function session($key = null)
{
    $session = new \App\Helper\Session();
    if (is_null($key)) return $session;
    return $session->get($key);
}

function cookie($key = null)
{
    $cookie = new \App\Helper\Cookie();
    if (is_null($key)) return $cookie;
    return $cookie->get($key);
}

function random($length = 16)
{
    $string = '';

    while (($len = strlen($string)) < $length) {
        $size = $length - $len;

        $bytes = random_bytes($size);

        $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
    }

    return $string;
}

function redirect($param = null)
{
    if (is_null($param))
        $param = '/';
    header('Location: ' . $param);
    exit();
}

function isLogin()
{
    return Auth::check();
}

function isAdmin(){
    return Auth::user()->type == 'admin';
}

function author($article){
    return (new Users())->find('id',$article->user_id)->name;
}
