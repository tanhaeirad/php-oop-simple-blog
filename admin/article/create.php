<?php
require_once __DIR__ . "/../../bootstrap/autoload.php";

if (!isAdmin()){
    redirect('/');
}


$article = new \App\Controller\ArticleController();
$article->create();
$_FLASH = $article->flash;

require('./../../templates/header.php');

?>



<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2>Create Article</h2>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-8 col-lg-offset-2">

            <?php
            if($_FLASH->hasMessages()) {
                $_FLASH->display();
            }
            ?>

            <form action="/admin/article/create.php" method="post">
                <div class="form-group">
                    <label >title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title ..." value="<?= old('title') ?>">
                </div>
                <div class="form-group">
                    <label >body</label>
                    <textarea name="body" rows="10" class="form-control" placeholder="Body ..."><?= old('body') ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">create</button>
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
