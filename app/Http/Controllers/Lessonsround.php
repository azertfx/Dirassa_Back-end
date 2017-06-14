<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Lesson;
use App\Article;

class Lessonsround extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idlevel, $level, $idspeciality, $speciality, $idmaterial, $material)
    {
        $newsallarticles = Article::where('stat','=','nouvelles')->orderBy('id','desc')->take(3)->get();
        $bacallarticles  = Article::where('stat','=','apres-bac')->orderBy('id','desc')->take(3)->get();
        $speciality      = str_replace('-', ' ', $speciality); 
        $material        = str_replace('-', ' ', $material); 
        $specialitynames = Category::where('id','=',$idspeciality)->get();
        $alllessons      = Lesson::groupBy('categories_id')->orderBy('id','desc')->get();
        $rounds1         = Lesson::where('round','=','1ere-session')->get();
        $rounds2         = Lesson::where('round','=','2eme-session')->get();
        $fullcat         = Category::get();
        $all             = Category::where('parent','=',0);
        $level           = str_replace('-', ' ', $level); 
        $levelnames      = Category::where('id','=',$idlevel)->get();
        $materialnames   = Category::where('id','=',$idmaterial)->get();
        foreach ($specialitynames as $specialityname) {
            $ar_specialityname = $specialityname->ar_name;
        };
        foreach ($levelnames as $levelname) {
            $ar_levelname = $levelname->ar_name;
        };
        foreach ($materialnames as $materialname) {
            $ar_materialname = $materialname->ar_name;
        };
        return view(proj.'.lessonsround',[
            'title'             =>$ar_materialname,
            'ar_levelname'      =>$ar_levelname,
            'idspeciality'      =>$idspeciality,
            'idmaterial'        =>$idmaterial,
            'ar_materialname'   =>$ar_materialname,
            'rounds1'           =>$rounds1,
            'rounds2'           =>$rounds2,
            'asccat'            =>$all->get(),
            'allcat'            =>$all->orderBy('id','desc')->get(),
            'fullcat'           =>$fullcat,
            'idlevel'           =>$idlevel,
            'level'             =>$level,
            'newsallarticles' =>$newsallarticles,
            'bacallarticles'  =>$bacallarticles,
            'alllessons'        =>$alllessons,
            'material'          =>$material,
            'ar_specialityname' =>$ar_specialityname,
            'speciality'        =>$speciality
            ]);
    }
}
