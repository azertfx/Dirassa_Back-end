<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;

class Send extends Controller
{
    public static function Mail($blade,$data){
        Mail::send($blade, $data, function ($m) use ($data) {
            $m->to($data['email'], $data['name'])->subject($data['subject']);
        });
    }
}
