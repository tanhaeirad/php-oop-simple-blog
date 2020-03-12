<?php


namespace App\Controller;


use App\Helper\Auth;
use App\Model\Article;

class AdminController extends UserController
{
    public function index(){
        return (new Article())->select('id' , 'title')->where('user_id',Auth::user()->id)->get();
    }
}