<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Exam;
use Validator;

class Materialimg extends Controller
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
        return view(athr.'.material_image',['title'=>trans('author.materialimage'),'countmaster'=>$countmaster->count(),'allmaster'=>$countmaster->get(),'all'=>$all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countmaster = Category::where('parent','=',0);
        return view(athr.'.addmaterialimage',[
            'title'=>trans('author.addlesson'),
            'countmaster'=>$countmaster->count(),
            'allmaster'=>$countmaster->get(),
            ]);
        
    }

    public function searchmaterialimg(Request $request){
        if ($request->ajax()) {
            if ($request->has('id')) {
                if ($request->input('id') > 0) {
                    $find_exam = Exam::where('categories_id','=',$request->input('id'))->get();
                    $scontent  = view(athr.'.searchmaterialimg',['find_exam'=>$find_exam])->render();
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
            'parent'        =>'required',
            'material_img'  =>'required|mimes:jpeg,png',
            'pdf_exam'      =>'required|mimes:pdf',
            'pdf_exam_corr' =>'required|mimes:pdf',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'parent'        =>trans('author.choicematerial'),
            'material_img'  =>trans('author.materialimg'),
            'pdf_exam'      =>trans('author.pdf_exam'),
            'pdf_exam_corr' =>trans('author.pdf_exam_corr'),
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            if($request->hasFile('material_img') && $request->hasFile('pdf_exam') && $request->hasFile('pdf_exam_corr')) {
                $imgs        = $request->file('material_img');
                $pdfexam     = $request->file('pdf_exam');
                $pdfexamcorr = $request->file('pdf_exam_corr');
                if ($imgs->isValid() && $pdfexam->isValid() && $pdfexamcorr->isValid()) {
                    $exam = new Exam;
                    $imgsext         = $imgs->getClientOriginalExtension();
                    $pdfexamext      = $pdfexam->getClientOriginalExtension();
                    $pdfexamcorrext  = $pdfexamcorr->getClientOriginalExtension();
                    $imgsname        = time().'.'.$imgsext;
                    $pdfexamname     = 2*time().'.'.$pdfexamext;
                    $pdfexamcorrname = 3*time().'.'.$pdfexamcorrext;
                    $exam->image         = $imgsname;
                    $exam->exam_pdf      = $pdfexamname;
                    $exam->exam_corr_pdf = $pdfexamcorrname;
                    $exam->categories_id = $request->input('parent');
                    $exam->save();
                    session()->flash('success',trans('author.success_add'));
                    $uploadimgs        = $imgs->move(base_path().'/resources/views/dirassa/asset/images',$imgsname);
                    $uploadpdfexam     = $pdfexam->move(base_path().'/resources/views/dirassa/asset/pdf',$pdfexamname);
                    $uploadpdfexamcorr = $pdfexamcorr->move(base_path().'/resources/views/dirassa/asset/pdf',$pdfexamcorrname);
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
    public function edit(Request $request, $id)
    {
        $all         = Category::where('parent','=',0)->paginate(10);
        $countmaster = Category::where('parent','=',0);
        $examfind    = Exam::find($id);
        return view(athr.'.editmaterialimg',['title'=>trans('author.editmaterialimg'),'countmaster'=>$countmaster->count(),'allmaster'=>$countmaster->get(),'all'=>$all])->with('examfind',$examfind);
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
            'material_img'  =>'required|mimes:jpeg,png',
            'pdf_exam'      =>'required|mimes:pdf',
            'pdf_exam_corr' =>'required|mimes:pdf',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'material_img'  =>trans('author.materialimg'),
            'pdf_exam'      =>trans('author.pdf_exam'),
            'pdf_exam_corr' =>trans('author.pdf_exam_corr'),
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            if($request->hasFile('material_img') && $request->hasFile('pdf_exam') && $request->hasFile('pdf_exam_corr')) {
                $imgs        = $request->file('material_img');
                $pdfexam     = $request->file('pdf_exam');
                $pdfexamcorr = $request->file('pdf_exam_corr');
                if ($imgs->isValid() && $pdfexam->isValid() && $pdfexamcorr->isValid()) {
                    $updateexam = Exam::find($id);
                    $imgsext         = $imgs->getClientOriginalExtension();
                    $pdfexamext      = $pdfexam->getClientOriginalExtension();
                    $pdfexamcorrext  = $pdfexamcorr->getClientOriginalExtension();
                    $imgsname        = time().'.'.$imgsext;
                    $pdfexamname     = 2*time().'.'.$pdfexamext;
                    $pdfexamcorrname = 3*time().'.'.$pdfexamcorrext;
                    $updateexam->image         = $imgsname;
                    $updateexam->exam_pdf      = $pdfexamname;
                    $updateexam->exam_corr_pdf = $pdfexamcorrname;
                    $updateexam->categories_id = $request->input('parent');
                    $updateexam->save();
                    session()->flash('success',trans('author.success_add'));
                    $uploadimgs        = $imgs->move(base_path().'/resources/views/dirassa/asset/images',$imgsname);
                    $uploadpdfexam     = $pdfexam->move(base_path().'/resources/views/dirassa/asset/pdf',$pdfexamname);
                    $uploadpdfexamcorr = $pdfexamcorr->move(base_path().'/resources/views/dirassa/asset/pdf',$pdfexamcorrname);
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
        Exam::find($id)->delete();
        return redirect('author/materialimage');
    }
}
