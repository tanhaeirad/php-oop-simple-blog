<?php namespace App\Controller;

use App\Model\Article;

class HomeController extends Controller
{
    public function index()
    {
        return (new Article())->all();
    }

    public function single($id)
    {
        if (!isset($id)) {
            $this->flash->error('مقاله‌ای برای نمایش انتخاب نشده است');
            redirect('/');
            exit();
        } else {
            $article = (new Article())->find('id', $id);
            if (!$article) {
                $this->flash->error('چنین مقاله‌ای وجود ندارد');
                redirect('/');
                exit();
            } else {
                return $article;
            }
        }
    }
}