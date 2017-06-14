<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;

class Showarticles extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($news , $idarticle , $article)
    {
        $all          = Category::where('parent','=',0);
        $newsarticles = Article::orderBy('id','desc')->where('stat','=','nouvelles')->take(5)->get();
        $bacarticles  = Article::orderBy('id','desc')->where('stat','=','apres-bac')->take(5)->get();
        $news         = str_replace('-', ' ', $news); 
        $arnews       = Category::where('fr_name','=',$news)->get();
        foreach ($arnews as $new) {
            $ar_news = $new->ar_name;
        };
        $fullcat      = Category::get();
        $findarticles = Article::where('id','=',$idarticle)->get();
        $newsallarticles = Article::where('stat','=','nouvelles')->orderBy('id','desc')->take(3)->get();
        $bacallarticles  = Article::where('stat','=','apres-bac')->orderBy('id','desc')->take(3)->get();
        return view(proj.'.news_articles',[
            'title'=>$article,
            'newsallarticles' =>$newsallarticles,
            'bacallarticles'  =>$bacallarticles,
            'newsarticles'=>$newsarticles,
            'bacarticles'=>$bacarticles,
            'asccat'=>$all->get(),
            'allcat'=>$all->orderBy('id','desc')->get(),
            'findarticles'=>$findarticles,
            'fullcat'=>$fullcat,
            'idarticle'=>$idarticle,
            'article'=>$article,
            'ar_news'=>$ar_news,
            'news'=>$news
        ]);
    }
}
