<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Validator;

class Soon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(proj.'.soon',[
            'title'=>trans('accueil.dirassa')]);
    }

    public function sendemail(Request $request)
    {
         $rules = [
            'email'=>'required|email|unique:users',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'email'=>trans('accueil.email'),
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else{
            $inscr = new User;
            $inscr->email = $request->input('email');
            $inscr->save();
            session()->flash('success',trans('accueil.success_insc'));
            return redirect()->back();
        }
    }
}
