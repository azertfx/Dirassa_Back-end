<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Send;
use App\Category;
use App\Article;
use App\Lesson;
use App\Exam;
use App\Partner;
use App\User;
use Validator;

class Dirassa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $all             = Category::where('parent','=',0);
        $fullcat         = Category::get();
        $allarticles     = Article::orderBy('id','desc')->take(10)->get();
        $alllessons      = Lesson::groupBy('categories_id')->orderBy('id','desc')->take(10)->get();
        $newsallarticles = Article::where('stat','=','nouvelles')->orderBy('id','desc')->take(3)->get();
        $bacallarticles  = Article::where('stat','=','apres-bac')->orderBy('id','desc')->take(3)->get();
        $lessons         = Lesson::all();
        $partners        = Partner::all();
        return view(proj.'.home',[
            'title'           =>trans('accueil.accueil'),
            'asccat'          =>$all->get(),
            'allcat'          =>$all->orderBy('id','desc')->get(),
            'fullcat'         =>$fullcat,
            'allarticles'     =>$allarticles,
            'newsallarticles' =>$newsallarticles,
            'bacallarticles'  =>$bacallarticles,
            'partners'        =>$partners,
            'alllessons'      =>$alllessons])->with('lessons',$lessons);
    }

    public static function lang(){
    	return 'ar_name';
    }

    public function inscription(Request $request)
    {
        $rules = [
            'username'=>'required',
            'email'=>'required|email|unique:users',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'email'=>trans('accueil.email'),
            'username'=>trans('accueil.username'),
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else{
            $inscr = new User;
            $inscr->name = $request->input('username');
            $inscr->email = $request->input('email');
            $inscr->save();
            $data = [
                'name'=>$inscr->name,
                'email'=>$inscr->email,
                'subject'=>trans('accueil.success_subject',['username'=>$inscr->name]),
                'data'=>$inscr
            ];
            Send::Mail(proj.'.insc_in_dirassa',$data);
            session()->flash('success',trans('accueil.success_insc'));
            return redirect()->back();
        }
    }

    

    public function contact(Request $request)
    {
        $rules = [
            'name'=>'required',
            'message'=>'required',
            'email'=>'required|email',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'email'=>trans('accueil.email'),
            'message'=>trans('accueil.message'),
            'name'=>trans('accueil.name'),
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else{
           /* $username = $request->input('name');
            $message  = $request->input('message');
            $email    = $request->input('email');
            $to = "abderrahim.nabaoui@ewa.ma"; 
            $subject = "Contact";
            $body = "Dirassa Contact\n".
                    "Nom     : $username\n".
                    "Email   : $email\n".
                    "Message : $message\n"; 
            $headers = "From: $email\n"; 
            $headers .= "Reply-To: $to";
            mail($to,$subject,$body,$headers);*/
            session()->flash('success',trans('accueil.success_send'));
            return redirect()->back();
        }
    }

    public function nous()
    {
        $all          = Category::where('parent','=',0);
        $newsallarticles = Article::where('stat','=','nouvelles')->orderBy('id','desc')->take(3)->get();
        $bacallarticles  = Article::where('stat','=','apres-bac')->orderBy('id','desc')->take(3)->get();
        $fullcat      = Category::get();
        return view(proj.'.team',[
            'title'        =>trans('author.our_contact'),
            'asccat'       =>$all->get(),
            'allcat'       =>$all->orderBy('id','desc')->get(),
            'newsallarticles' =>$newsallarticles,
            'bacallarticles'  =>$bacallarticles,
            'fullcat'      =>$fullcat
            ]);
    }

    public function contactnous()
    {
        $all          = Category::where('parent','=',0);
        $newsallarticles = Article::where('stat','=','nouvelles')->orderBy('id','desc')->take(3)->get();
        $bacallarticles  = Article::where('stat','=','apres-bac')->orderBy('id','desc')->take(3)->get();
        $fullcat      = Category::get();
        return view(proj.'.contact_dirassa',[
            'title'        =>trans('author.our_contact'),
            'asccat'       =>$all->get(),
            'allcat'       =>$all->orderBy('id','desc')->get(),
            'newsallarticles' =>$newsallarticles,
            'bacallarticles'  =>$bacallarticles,
            'fullcat'      =>$fullcat
            ]);
    }
}
