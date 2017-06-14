<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Article;
use App\Annuaire;

class News extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id , $news)
    {
        $all          = Category::where('parent','=',0);
        $annuaireville  = Annuaire::groupBy('ville')->get();
        $annuairedomain  = Annuaire::groupBy('domain')->get();
        $annuairesecteur  = Annuaire::groupBy('secteur')->get();
        $fullcat      = Category::get();
        $allarticles  = Article::orderBy('id','desc')->take(10)->get();
        $newsarticles = Article::orderBy('id','desc')->where('stat','=','nouvelles')->take(18)->get();
        $bacarticles  = Article::orderBy('id','desc')->where('stat','=','apres-bac')->take(18)->get();
        $fallarticles = Article::orderBy('id','desc')->take(3)->get();
        $newsallarticles = Article::where('stat','=','nouvelles')->orderBy('id','desc')->take(3)->get();
        $bacallarticles  = Article::where('stat','=','apres-bac')->orderBy('id','desc')->take(3)->get();
        $news         = str_replace('-', ' ', $news); 
        $newsnames    = Category::where('fr_name','=',$news)->get();
        foreach ($newsnames as $newsname) {
            $ar_newsname = $newsname->ar_name;
        };
        return view(proj.'.news',[
            'title'=>$ar_newsname,
            'newsallarticles' =>$newsallarticles,
            'bacallarticles'  =>$bacallarticles,
            'asccat'=>$all->get(),
            'allcat'=>$all->orderBy('id','desc')->get(),
            'allarticles'=>$allarticles,
            'annuaireville'=>$annuaireville,
            'annuairedomain'=>$annuairedomain,
            'annuairesecteur'=>$annuairesecteur,
            'newsarticles'=>$newsarticles,
            'bacarticles'=>$bacarticles,
            'fullcat'=>$fullcat,
            'id'=>$id,
            'news'=>$news
        ]);
    }
    
    public function searchannuaire(Request $request)
    {
        if ($request->ajax()) {
            if ($request->has('ville') && $request->has('domain') && $request->has('secteur')) {
                    $searchannuaireville = Annuaire::groupBy('ville')->where('ville','=',$request->input('ville'))->get();
                    $searchannuairedomain = Annuaire::groupBy('domain')->where('domain','=',$request->input('domain'))->get();
                    $searchannuairesecteur = Annuaire::groupBy('secteur')->where('secteur','=',$request->input('secteur'))->get();
                    $scontent  = view(proj.'.searchannuaire',['searchannuaireville'=>$searchannuaireville,'searchannuairedomain'=>$searchannuairedomain,'searchannuairesecteur'=>$searchannuairesecteur])->render();
                    return response()->json($scontent);
            }
        }
    }
}
