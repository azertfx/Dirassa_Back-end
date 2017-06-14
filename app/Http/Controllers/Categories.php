<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use Validator;

class Categories extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Category::where('parent','=',0)->paginate(10);
        $countmaster = Category::where('parent','=',0);
        return view(athr.'.categories',['title'=>trans('author.categories'),'countmaster'=>$countmaster->count(),'allmaster'=>$countmaster->get(),'all'=>$all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countmaster = Category::where('parent','=',0);
        return view(athr.'.create',[
            'title'=>trans('author.newcategories'),
            'countmaster'=>$countmaster->count(),
            'allmaster'=>$countmaster->get(),
            ]);
    }

    public function getcat(Request $request){
        if ($request->ajax()) {
            if ($request->has('id')) {
                if ($request->input('id') > 0) {
                    $getcat = Category::where('parent','=',$request->input('id'))->get();
                    $content = view(athr.'.getcat',['allcat'=>$getcat])->render();
                    return response()->json($content);
                }
            }
        }
    }

    public function searchcat(Request $request){
        if ($request->ajax()) {
            if ($request->has('id')) {
                if ($request->input('id') > 0) {
                    $searchcat = Category::where('parent','=',$request->input('id'))->get();
                    $catename  = Category::where('id','=',$request->input('id'))->get();
                    $scontent  = view(athr.'.searchcat',['allcat'=>$searchcat,'namecat'=>$catename])->render();
                    return response()->json($scontent);
                }
            }
        }
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
            'ar_name'=>'required',
            'fr_name'=>'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'ar_name'=>trans('author.ar_name'),
            'fr_name'=>trans('author.fr_name'),
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $new = new Category;
            $new->ar_name = $request->input('ar_name');
            $new->fr_name = $request->input('fr_name');
            if ($request->has('parent')) {
                $new->parent = $request->input('parent');
            }
            $new->save();
            session()->flash('success',trans('author.success_add'));
            return redirect()->back();
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
        $all = Category::where('parent','=',0)->paginate(10);
        $countmaster = Category::where('parent','=',0);
        $catid = Category::find($id);
        return view(athr.'.editcategories',['title'=>trans('author.editcategory'),'countmaster'=>$countmaster->count(),'allmaster'=>$countmaster->get(),'all'=>$all])->with('editcat',$catid);
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
            'ar_name'=>'required',
            'fr_name'=>'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'ar_name'=>trans('author.ar_name'),
            'fr_name'=>trans('author.fr_name'),
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $update = Category::find($id);
            $update->ar_name = $request->input('ar_name');
            $update->fr_name = $request->input('fr_name');
            if ($request->has('parent')) {
                $update->parent = $request->input('parent');
            }
            $update->save();
            session()->flash('success',trans('author.success_add'));
            return redirect('author/categories');
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
        Category::find($id)->delete();
        return redirect('author/categories');
    }
}
