<?php /** @noinspection ALL */


namespace App\Controller;

require_once __DIR__ . '/../../bootstrap/autoload.php';

use App\Helper\Auth;
use App\Model\Article;
use Carbon\Carbon;

class ArticleController extends Controller
{
    public function create()
    {
        if (!request()->isPost())
            return;

        $rules = [
            'title' => 'required',
            'body' => 'required'
        ];

        if (!$this->validation(request()->all(), $rules)) {
            return;
        }

        (new Article())->create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => (int)Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);


        $this->flash->info("مقاله شما ایجاد شد");

        redirect('/admin/index.php');
        return;
    }

    public function delete()
    {
        $id = $_GET['id'];

        if (!isset($id)) {
            $this->flash->error('هیچ مقاله‌ای برای حذف انتخاب نشده است');
            redirect('/admin/index.php');
        }
        $article = (new Article())->find('id', request('id'));

        if (!$article) {
            $this->flash->error('چنین مقاله‌ای یافت نشد');
            redirect('/admin');
        }

        if (!$this->hasAccess($article)) {
            $this->flash->error("شما دسترسی برای حذف مقاله {$article->title} را ندارید");
            redirect('/admin');
        }


        $title = $article->title;
        (new Article())->delete(request('id'));
        $this->flash->error("مقاله {$title} حذف شد");
        redirect('/admin/index.php');
    }


    public function edit()
    {
        $id = $_GET['id'];

        if (!isset($id)) {
            $this->flash->error('هیچ مقاله‌ای برای ویرایش انتخاب نشده است');
            redirect('/admin/index.php');
        }
        $article = (new Article())->find('id', $id);
        if (!$article) {
            $this->flash->error('چنین مقاله‌ای یافت نشد');
            redirect('/admin');
        }
        return $article;
    }

    public function update($articleId)
    {
        $article = (new Article())->find('id', $articleId);
        if (!$this->hasAccess($article)) {
            $this->flash->error("شما دسترسی برای ویرایش مقاله {$article->title} را ندارید");
            redirect('/admin');
        }

        $rules = [
            'title' => 'required',
            'body' => 'required'
        ];

        if (!$this->validation(request()->all(), $rules)) {
            return;
        }

        (new Article())->update($articleId, [
            'title' => request('title'),
            'body' => request('body')
        ]);
        $ٓtitle = request('title');
        $this->flash->success("مقاله {$ٓtitle} ویرایش شد");

        redirect('/admin');
    }

    public function hasAccess($article)
    {
        $user = Auth::user();
        return $article->user_id == $user->id;
    }

}