<?php
include __DIR__ . '/../../bootstrap/autoload.php';

(new \App\Controller\ArticleController())->update(request()->input('id' , false));