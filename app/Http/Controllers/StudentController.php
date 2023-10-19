<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    // function home($id){
    //     // $name1 = "Md Shariful Islam";
    //     // $name2 = "Md Aminul Islam Rehan";
    //     if($id == 1){
    //         $s['name1'] = "Md Shariful Islam";
    //     }else{
    //         $s['name2'] = "Md Aminul Islam Rehan";
    //     }
        
        
    //     // return view('home.home',['name1'=>$name1,'name2'=>$name2]);
    //     return view('home.home',$s);
    //     // return view('home.home',compact('name1','name2'));
    // }
    // function create(){
    //     return view('home.create');
    // }

    function index(){
        $s['students'] = Student::all();
        return view('student.index',$s);
    }
    function create(){
        return view('student.create');
    }
    function store(Request $req){
        $req->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:students,email',
            'roll' => 'required|numeric|unique:students,roll|min:10000000',
            'reg' => 'required|numeric|unique:students,reg|min:1000000000000000',
            'number' => 'required|numeric|unique:students,number|digits:11',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,webp,svg|max:2048',
            'address' => 'required',
            'description' => 'required',
        ]);
        $student = new Student();
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $customFileName = $req->name .'-'.Str::random(3) .'.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('students', $customFileName,'public');
            $student->image = $path;
        }
        $student->name = $req->name;
        $student->email = $req->email;
        $student->number = $req->number;
        $student->roll = $req->roll;
        $student->reg = $req->reg;
        $student->address = $req->address;
        $student->description = $req->description;
        $student->save();
        return redirect()->route('student.index')->withStatus('Student Created Successfully');

    }
    function edit($id){
        $s['student'] = Student::findOrFail($id);
        // $student = Student::findOrFail($id);
        return view('student.edit',$s);
        // return view('student.edit',compact('student',$student));
        // return view('student.edit',['student'=>$student]);
    }
    function update(Request $req, $id){
        $req->validate([
            "name" => "required|max:50",
            "email" => "required|email|unique:students,email,$id",
            "roll" => "required|numeric|unique:students,roll,$id|min:10000000",
            "reg" => "required|numeric|unique:students,reg,$id|min:1000000000000000",
            "number" => "required|numeric|unique:students,number,$id|digits:11",
            "image" => "nullable|image|mimes:jpeg,jpg,png,gif,webp,svg|max:2048",
            "address" => "required",
            "description" => "required",
        ]);
        $student = Student::findOrFail($id);
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $customFileName = $req->name.'-'. Str::random(3) .'.' . $image->getClientOriginalExtension();
            Storage::delete('public/' . $student->image);
            $path = $image->storeAs('students', $customFileName,'public');
            $student->image = $path;
        }
        $student->name = $req->name;
        $student->email = $req->email;
        $student->number = $req->number;
        $student->roll = $req->roll;
        $student->reg = $req->reg;
        $student->address = $req->address;
        $student->description = $req->description;
        $student->update();
        return redirect()->route('student.index')->withStatus('Student Updated Successfully');
    }
    function delete($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('student.index');
    }
}
