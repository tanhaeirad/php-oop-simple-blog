<?php

use Carbon\Carbon as Carbon;

require_once __DIR__ . "/bootstrap/autoload.php";
$articles = (new \App\Controller\HomeController())->index();
require('./templates/header.php');
?>


<!-- Page Content -->
<div class="container">

    <div class="row">
        <?php
        if ($_FLASH->hasMessages()) {
            $_FLASH->display();
        }
        ?>

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Articles:
            </h1>

            <?php foreach ($articles as $article): ?>
                <h2>
                    <a href="/article.php<?= '?id='.$article->id ?>"><?= $article->title ?></a>
                </h2>
                <p class="lead">
                    by <?= author($article) ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?= Carbon::parse($article->created_at) ?></p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p><?= substr($article->body,0,200).'...' ?></p>
                <a class="btn btn-primary" href="/article.php<?= '?id='.$article->id ?>">Read More <span
                            class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <?php endforeach; ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus
                    laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>

    </div>
    <!-- /.row -->


<?php
require('./templates/footer.php');
