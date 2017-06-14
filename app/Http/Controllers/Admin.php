<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class Admin extends Controller
{ 
    public function logout()
    {
        auth()->logout();
        return redirect('dirassaloginadmin');
    }

    public function login()
    {
        if (auth()->user()) {
            if (auth()->user()->level == 'admin') {
                return redirect(athr.'/categories');
            }
            if (auth()->user()->level == 'user') {
                return redirect(proj);
            }
        }
        return view(proj.'.dirassaloginadmin',['title'=>trans('accueil.login')]);
    }

    public function postlogin(Request $request)
    {
        $rules = [
            'email'=>'required|email',
            'password'=>'required|min:6',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'email'=>trans('accueil.email'),
            'password'=>trans('accueil.password'),
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else{
            if (auth()->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])) {
                if (auth()->user()->level == 'admin') {
                    return redirect(athr.'/categories');
                }
                if (auth()->user()->level == 'user') {
                    return redirect(proj);
                }
            }else{
                session()->flash('error',trans('accueil.errorlogindata'));
                return redirect()->back();
            }
        }
    }
}
