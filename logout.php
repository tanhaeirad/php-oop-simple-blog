<?php

$str = '';

include './bootstrap/autoload.php';

use App\Helper\Auth;

if (isLogin()) {
    Auth::logout();
    $_FLASH->success("شما خارج شدید");
}else{
    $_FLASH->error("شما در سایت وارد نشده اید");
}

redirect();
