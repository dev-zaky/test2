<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    function home($id){
        // $name1 = "Md Shariful Islam";
        // $name2 = "Md Aminul Islam Rehan";
        if($id == 1){
            $s['name1'] = "Md Shariful Islam";
        }else{
            $s['name2'] = "Md Aminul Islam Rehan";
        }
        
        
        // return view('home.home',['name1'=>$name1,'name2'=>$name2]);
        return view('home.home',$s);
        // return view('home.home',compact('name1','name2'));
    }
    function create(){
        return view('home.create');
    }


}
