<?php
require_once __DIR__ . "/../../bootstrap/autoload.php";

if (!isAdmin()) {
    redirect('/');
}

$article_controller = new \App\Controller\ArticleController();
$article = $article_controller->edit();
$_FLASH = $article_controller->flash;

require('./../../templates/header.php');

?>


<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2>Edit Article</h2>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-8 col-lg-offset-2">

            <?php
            if ($_FLASH->hasMessages()) {
                $_FLASH->display();
            }
            ?>

            <form action="/admin/article/update.php?id=<?= $article->id ?>" method="post">
                <div class="form-group">
                    <label>title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title ..."
                           value="<?= $article->title ?>">
                </div>
                <div class="form-group">
                    <label>body</label>
                    <textarea name="body" rows="10" class="form-control"
                              placeholder="Body ..."><?= $article->body ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">edit</button>
                </div>
            </form>
        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->
