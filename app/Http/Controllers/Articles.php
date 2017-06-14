<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use Validator;

class Articles extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countarticles = Article::get()->count();
        return view(athr.'.articles',['title'=>trans('author.articles'),'countarticles'=>$countarticles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(athr.'.addarticles',['title'=>trans('author.addarticles')]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'ar_title'=>'required',
            'fr_title'=>'required',
            'ar_contents'=>'required',
            'fr_contents'=>'required',
            'articlesimage'=>'required|max:10000|mimes:jpeg,png',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'ar_title'=>trans('author.ar_title'),
            'fr_title'=>trans('author.fr_title'),
            'ar_contents'=>trans('author.ar_contents'),
            'fr_contents'=>trans('author.fr_contents'),
            'articlesimage'=>trans('author.articlesimage'),
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else{
            if($request->hasFile('articlesimage')) {
                $image = $request->file('articlesimage');
                if ($image->isValid()) {
                    $article = new Article;
                    $ext = $image->getClientOriginalExtension();
                    $imagename = time().'.'.$ext;
                    $article->images            = $imagename;
                    $article->ar_titles         = $request->input('ar_title');
                    $article->short_ar_titles   = str_limit($article->ar_titles,15);
                    $article->fr_titles         = $request->input('fr_title');
                    $article->short_fr_titles   = str_limit($article->fr_titles,15);
                    $article->ar_contents       = $request->input('ar_contents');
                    $article->short_ar_contents = str_limit($article->ar_contents,100);
                    $article->fr_contents       = $request->input('fr_contents');
                    $article->short_fr_contents = str_limit($article->fr_contents,100);
                    $article->stat              = $request->input('stat');
                    $article->save();
                    session()->flash('success',trans('author.success_add'));
                    $upload = $image->move(base_path().'/resources/views/dirassa/asset/images',$imagename);
                    return redirect()->back();
                }
            }
        }
    }

    public function searcharticles(Request $request){
        if ($request->ajax()) {
            if ($request->has('articlestat')) {
                    $searcharticles = Article::where('stat','=',$request->input('articlestat'))->get();
                    $scontent  = view(athr.'.searcharticles',['allarticles'=>$searcharticles])->render();
                    return response()->json($scontent);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articlefind = Article::find($id);
        return view(athr.'.editarticles',['title'=>trans('author.editarticles')])->with('articlefind',$articlefind);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'ar_title'=>'required',
            'fr_title'=>'required',
            'ar_contents'=>'required',
            'fr_contents'=>'required',
            'articlesimage'=>'required|max:1000|mimes:jpeg,png',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'ar_title'=>trans('author.ar_title'),
            'fr_title'=>trans('author.fr_title'),
            'ar_contents'=>trans('author.ar_contents'),
            'fr_contents'=>trans('author.fr_contents'),
            'articlesimage'=>trans('author.articlesimage'),
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else{
            if($request->hasFile('articlesimage')) {
                $image = $request->file('articlesimage');
                if ($image->isValid()) {
                    $update = Article::find($id);
                    $ext = $image->getClientOriginalExtension();
                    $imagename = time().'.'.$ext;
                    $update->images            = $imagename;
                    $update->ar_titles         = $request->input('ar_title');
                    $update->short_ar_titles   = str_limit($update->ar_titles,15);
                    $update->fr_titles         = $request->input('fr_title');
                    $update->short_fr_titles   = str_limit($update->fr_titles,15);
                    $update->ar_contents       = $request->input('ar_contents');
                    $update->short_ar_contents = str_limit($update->ar_contents,100);
                    $update->fr_contents       = $request->input('fr_contents');
                    $update->short_fr_contents = str_limit($update->fr_contents,100);
                    $update->stat              = $request->input('stat');
                    $update->save();
                    session()->flash('success',trans('author.success_add'));
                    $upload = $image->move(base_path().'/resources/views/dirassa/asset/images',$imagename);
                    return redirect()->back();
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect('author/articles');
    }
}
