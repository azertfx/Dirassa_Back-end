<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

define('lang', App\Http\Controllers\Dirassa::lang());
define('proj', 'dirassa');
define('athr', 'author');
define('ASSET',url('asset'));

Route::get('/','Soon@index');
Route::post('/','Soon@sendemail');

Route::group(['middleware'=>'UsersAuth'],function(){
	Route::get(proj,'Dirassa@home');
	Route::get(proj.'/nous','Dirassa@nous');
	Route::get(proj.'/contactnous','Dirassa@contactnous');
	Route::post(proj.'/contactnous','Dirassa@contact');
	Route::post(proj,'Dirassa@inscription');

	Route::get(proj.'/{idlevel}/{level}/{idspeciality}/{speciality}/{idmaterial}/{material}/{idlesson}/{lesson}/exercices','Exercice@index');
	Route::get(proj.'/{idlevel}/{level}/{idspeciality}/{speciality}/{idmaterial}/{material}/{idlesson}/{lesson}/resume','Resume@index');
	Route::get(proj.'/{idlevel}/{level}/{idspeciality}/{speciality}/{idmaterial}/{material}/{idlesson}/{lesson}','Material@index');
	Route::get(proj.'/{idlevel}/{level}/{idspeciality}/{speciality}/{idmaterial}/{material}/examen','Examens@index');
	Route::get(proj.'/{idlevel}/{level}/{idspeciality}/{speciality}/{idmaterial}/{material}','Lessonsround@index');
	Route::get(proj.'/{idlevel}/{level}/{idspeciality}/{speciality}','Speciality@index');
	Route::get(proj.'/{news}/{idarticle}/{article}','Showarticles@index');
	Route::get(proj.'/{idnews}/{news}','News@index');
	Route::post(proj.'/{idnews}/{news}/searchannuaire','News@searchannuaire');
});

Route::group(['middleware'=>'AdminAuth'],function(){
	Route::resource(athr.'/categories','Categories');  
	Route::post(athr.'/categories/getcat','Categories@getcat');  
	Route::post(athr.'/categories/searchcat','Categories@searchcat'); 

	Route::resource(athr.'/articles','Articles');  
	Route::post(athr.'/articles/searcharticles','Articles@searcharticles'); 

	Route::resource(athr.'/lessons','Lessons');  
	Route::post(athr.'/lessons/searchlessons','Lessons@searchlessons');

	Route::resource(athr.'/materialimage','Materialimg');  
	Route::post(athr.'/materialimage/searchmaterialimg','Materialimg@searchmaterialimg');

	Route::resource(athr.'/partners','Partners'); 

	Route::resource(athr.'/ecoles','Ecoles'); 

});
	Route::get('adlogout','Admin@logout');

Route::group(['after'=>'notlogin'],function(){
	Route::get('dirassaloginadmin','Admin@login');
	Route::post('dirassaloginadmin','Admin@postlogin');
});
	