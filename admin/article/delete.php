<?php
require_once __DIR__ . "/../../bootstrap/autoload.php";

if (!isAdmin()){
    redirect('/');
}


$article = new \App\Controller\ArticleController();
$article->delete();
$_FLASH = $article->flash;
