<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Article;
use App\Lesson;

class Speciality extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idlevel, $level, $idspeciality, $speciality)
    {
        $alllessons      = Lesson::groupBy('categories_id')->orderBy('id','desc')->get();
        $all             = Category::where('parent','=',0);
        $fullcat         = Category::get();
        $newsallarticles = Article::where('stat','=','nouvelles')->orderBy('id','desc')->take(3)->get();
        $bacallarticles  = Article::where('stat','=','apres-bac')->orderBy('id','desc')->take(3)->get();
        $speciality      = str_replace('-', ' ', $speciality); 
        $level           = str_replace('-', ' ', $level); 
        $levelnames      = Category::where('id','=',$idlevel)->get();
        $specialitynames = Category::where('id','=',$idspeciality)->get();
        foreach ($specialitynames as $specialityname) {
            $ar_specialityname = $specialityname->ar_name;
        };
        foreach ($levelnames as $levelname) {
            $ar_levelname = $levelname->ar_name;
        };
        return view(proj.'.speciality',[
            'title'        =>$ar_specialityname,
            'ar_levelname' =>$ar_levelname,
            'asccat'       =>$all->get(),
            'allcat'       =>$all->orderBy('id','desc')->get(),
            'fullcat'      =>$fullcat,
            'idlevel'      =>$idlevel,
            'idspeciality' =>$idspeciality,
            'level'        =>$level,
            'newsallarticles' =>$newsallarticles,
            'bacallarticles'  =>$bacallarticles,
            'alllessons'   =>$alllessons,
            'speciality'   =>$speciality
            ]);
    }
}
