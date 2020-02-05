<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    protected $news;
    public function __construct(News $news)
    {
        $this->news = $news;
    }
    public function index(){
        $newsList = $this->news->getNewsList();
        isset($newsList[0])?$newsList:null;
        return view('frontend.news-main',compact('newsList'));
    }
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        $newsShow = $this->news->getNewsById($id);
        return view('frontend.news-show',compact('newsShow'));
    }
}
