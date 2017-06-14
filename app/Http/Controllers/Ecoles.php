<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Annuaire;
use Validator;

class Ecoles extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(athr.'.ecoles',['title'=>trans('author.ecoles')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'full_ar_name'=>'required',
            'res_fr_name'=>'required',
            'full_fr_name'=>'required',
            'ville'=>'required',
            'domain'=>'required',
            'secteur'=>'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'full_ar_name'=>trans('author.full_ar_name'),
            'res_fr_name'=>trans('author.res_fr_name'),
            'full_fr_name'=>trans('author.full_fr_name'),
            'ville'=>trans('author.ville'),
            'domain'=>trans('author.domain'),
            'secteur'=>trans('author.secteur'),
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $annuaire = new Annuaire;
            $annuaire->full_ar_name = $request->input('full_ar_name');
            $annuaire->res_fr_name = $request->input('res_fr_name');
            $annuaire->full_fr_name = $request->input('full_fr_name');
            $annuaire->ville = $request->input('ville');
            $annuaire->domain = $request->input('domain');
            $annuaire->secteur = $request->input('secteur');
            $annuaire->save();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
