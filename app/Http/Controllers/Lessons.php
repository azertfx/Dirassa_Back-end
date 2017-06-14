<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Lesson;
use Validator;

class Lessons extends Controller
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
        return view(athr.'.lessons',['title'=>trans('author.lessons'),'countmaster'=>$countmaster->count(),'allmaster'=>$countmaster->get(),'all'=>$all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countmaster = Category::where('parent','=',0);
        return view(athr.'.addlesson',[
            'title'=>trans('author.addlesson'),
            'countmaster'=>$countmaster->count(),
            'allmaster'=>$countmaster->get(),
            ]);
    }

    public function searchlessons(Request $request){
        if ($request->ajax()) {
            if ($request->has('id')) {
                if ($request->input('id') > 0) {
                    $find_lesson = Lesson::where('categories_id','=',$request->input('id'))->get();
                    $scontent  = view(athr.'.searchlessons',['find_lesson'=>$find_lesson])->render();
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
            'round'             =>'required',
            'parent'            =>'required',
            'ar_lesson'         =>'required',
            'fr_lesson'         =>'required',
            'pdf_lesson'        =>'required',
            'pdf_sommary'       =>'required',
            'pdf_exercice'      =>'required',
            'pdf_exercice_corr' =>'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'round'             =>trans('author.round'),
            'parent'            =>trans('author.parent'),
            'ar_lesson'         =>trans('author.ar_name'),
            'fr_lesson'         =>trans('author.fr_name'),
            'pdf_lesson'        =>trans('author.pdf_lesson|mimes:pdf'),
            'pdf_sommary'       =>trans('author.pdf_sommary|mimes:pdf'),
            'pdf_exercice'      =>trans('author.pdf_exercice|mimes:pdf'),
            'pdf_exercice_corr' =>trans('author.pdf_exercice_corr|mimes:pdf'),
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            if($request->hasFile('pdf_lesson') && $request->hasFile('pdf_sommary') && $request->hasFile('pdf_exercice') && $request->hasFile('pdf_exercice_corr') ) {
                $pdflesson       = $request->file('pdf_lesson');
                $pdfsommary      = $request->file('pdf_sommary');
                $pdfexercice     = $request->file('pdf_exercice');
                $pdfexercicecorr = $request->file('pdf_exercice_corr');
                if ($pdflesson->isValid() && $pdfsommary->isValid() && $pdfexercice->isValid() && $pdfexercicecorr->isValid() ) {
                    $lesson = new Lesson;
                    $lessonext       = $pdflesson->getClientOriginalExtension();
                    $sommaryext      = $pdfsommary->getClientOriginalExtension();
                    $exerciceext     = $pdfexercice->getClientOriginalExtension();
                    $exercicecorrext = $pdfexercicecorr->getClientOriginalExtension();
                    $lessonename       = time().'.'.$lessonext;
                    $sommaryename      = 2*time().'.'.$sommaryext;
                    $exerciceename     = 3*time().'.'.$exerciceext;
                    $exercicecorrename = 4*time().'.'.$exercicecorrext;
                    $lesson->lesson_pdf        = $lessonename;
                    $lesson->sommary_pdf       = $sommaryename;
                    $lesson->exercice_pdf      = $exerciceename;
                    $lesson->exercice_corr_pdf = $exercicecorrename;
                    $lesson->ar_title          = $request->input('ar_lesson');
                    $lesson->fr_title          = $request->input('fr_lesson');
                    $lesson->categories_id     = $request->input('parent');
                    $lesson->round             = $request->input('round');
                    $lesson->save();
                    session()->flash('success',trans('author.success_add'));
                    $uploadlesson        = $pdflesson->move(base_path().'/resources/views/dirassa/asset/pdf',$lessonename);
                    $uploadsommary       = $pdfsommary->move(base_path().'/resources/views/dirassa/asset/pdf',$sommaryename);
                    $uploadexercic       = $pdfexercice->move(base_path().'/resources/views/dirassa/asset/pdf',$exerciceename);
                    $uploadexercice_corr = $pdfexercicecorr->move(base_path().'/resources/views/dirassa/asset/pdf',$exercicecorrename);
                    return redirect()->back();
                }
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
        $all = Category::where('parent','=',0)->paginate(10);
        $countmaster = Category::where('parent','=',0);
        $lessonfind = Lesson::find($id);
        return view(athr.'.editlessons',['title'=>trans('author.editlessons'),'countmaster'=>$countmaster->count(),'allmaster'=>$countmaster->get(),'all'=>$all])->with('lessonfind',$lessonfind);
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
            'round'             =>'required',
            'ar_lesson'         =>'required',
            'fr_lesson'         =>'required',
            'pdf_lesson'        =>'required',
            'pdf_sommary'       =>'required',
            'pdf_exercice'      =>'required',
            'pdf_exercice_corr' =>'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'round'             =>trans('author.round'),
            'ar_lesson'         =>trans('author.ar_name'),
            'fr_lesson'         =>trans('author.fr_name'),
            'pdf_lesson'        =>trans('author.pdf_lesson|mimes:pdf'),
            'pdf_sommary'       =>trans('author.pdf_sommary|mimes:pdf'),
            'pdf_exercice'      =>trans('author.pdf_exercice|mimes:pdf'),
            'pdf_exercice_corr' =>trans('author.pdf_exercice_corr|mimes:pdf'),
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            if($request->hasFile('pdf_lesson') && $request->hasFile('pdf_sommary') && $request->hasFile('pdf_exercice') && $request->hasFile('pdf_exercice_corr') ) {
                $pdflesson       = $request->file('pdf_lesson');
                $pdfsommary      = $request->file('pdf_sommary');
                $pdfexercice     = $request->file('pdf_exercice');
                $pdfexercicecorr = $request->file('pdf_exercice_corr');
                if ($pdflesson->isValid() && $pdfsommary->isValid() && $pdfexercice->isValid() && $pdfexercicecorr->isValid() ) {
                    $updatelesson = Lesson::find($id);
                    $lessonext       = $pdflesson->getClientOriginalExtension();
                    $sommaryext      = $pdfsommary->getClientOriginalExtension();
                    $exerciceext     = $pdfexercice->getClientOriginalExtension();
                    $exercicecorrext = $pdfexercicecorr->getClientOriginalExtension();
                    $lessonename       = time().'.'.$lessonext;
                    $sommaryename      = 2*time().'.'.$sommaryext;
                    $exerciceename     = 3*time().'.'.$exerciceext;
                    $exercicecorrename = 4*time().'.'.$exercicecorrext;
                    $updatelesson->lesson_pdf        = $lessonename;
                    $updatelesson->sommary_pdf       = $sommaryename;
                    $updatelesson->exercice_pdf      = $exerciceename;
                    $updatelesson->exercice_corr_pdf = $exercicecorrename;
                    $updatelesson->ar_title          = $request->input('ar_lesson');
                    $updatelesson->fr_title          = $request->input('fr_lesson');
                    $updatelesson->categories_id     = $request->input('parent');
                    $updatelesson->round             = $request->input('round');
                    $updatelesson->save();
                    session()->flash('success',trans('author.success_add'));
                    $uploadlesson        = $pdflesson->move(base_path().'/resources/views/dirassa/asset/pdf',$lessonename);
                    $uploadsommary       = $pdfsommary->move(base_path().'/resources/views/dirassa/asset/pdf',$sommaryename);
                    $uploadexercic       = $pdfexercice->move(base_path().'/resources/views/dirassa/asset/pdf',$exerciceename);
                    $uploadexercice_corr = $pdfexercicecorr->move(base_path().'/resources/views/dirassa/asset/pdf',$exercicecorrename);
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
        Lesson::find($id)->delete();
        return redirect('author/lessons');
    }
}
