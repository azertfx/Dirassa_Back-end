<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Partner;
use Validator;

class Partners extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allpartners = Partner::all();
        return view(athr.'.partners',['title'=>trans('author.partners'),'allpartners'=>$allpartners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(athr.'.addpartners',['title'=>trans('author.addpartners')]);
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
            'partnername' =>'required',
            'partnerimage'=>'required|max:5000|mimes:jpeg,png',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'partnername' =>trans('author.partnername'),
            'partnerimage'=>trans('author.partnerimage'),
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else{
            if($request->hasFile('partnerimage')) {
                $logo = $request->file('partnerimage');
                if ($logo->isValid()) {
                    $partner = new Partner;
                    $ext = $logo->getClientOriginalExtension();
                    $logoname = time().'.'.$ext;
                    $partner->logo = $logoname;
                    $partner->name = $request->input('partnername');
                    $partner->save();
                    session()->flash('success',trans('author.success_add'));
                    $upload = $logo->move(base_path().'/resources/views/dirassa/asset/images',$logoname);
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
        $partnerfind = Partner::find($id);
        return view(athr.'.editpartners',['title'=>trans('author.editpartners')])->with('partnerfind',$partnerfind);
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
            'partnername' =>'required',
            'partnerimage'=>'required|max:5000|mimes:jpeg,png',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'partnername' =>trans('author.partnername'),
            'partnerimage'=>trans('author.partnerimage'),
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else{
            if($request->hasFile('partnerimage')) {
                $logo = $request->file('partnerimage');
                if ($logo->isValid()) {
                    $updatepartner = Partner::find($id);
                    $ext = $logo->getClientOriginalExtension();
                    $logoname = time().'.'.$ext;
                    $updatepartner->logo = $logoname;
                    $updatepartner->name = $request->input('partnername');
                    $updatepartner->save();
                    session()->flash('success',trans('author.success_add'));
                    $upload = $logo->move(base_path().'/resources/views/dirassa/asset/images',$logoname);
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
        Partner::find($id)->delete();
        return redirect('author/partners');
    }
}
