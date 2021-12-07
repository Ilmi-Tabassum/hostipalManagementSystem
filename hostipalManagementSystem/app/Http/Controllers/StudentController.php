<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
public function indexing(){

    $student =Student::all();
    return view('student.indexing',compact('student'));
}
    public function create(){
        return view('student.create');
    }

    public function store(Request $request){
    $student = new Student;
    $student->name =$request->input('name');
        $student->email=$request->input('email');
        $student->phone=$request->input('phone');
        if($request->hasFile('profile_image')){

            $file =$request->file('profile_image');
            $extension =$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/students/',$filename);
            $student->profile_image = $filename;
        }
        $student->save();
        return redirect()->back()->with('status','Doctor Info Added Succesfully');
    }

    public function edit($id){
    $student = Student::find($id);
    return view('student.edit',compact('student'));
    }
    public function update(Request $request, $id){
    $student = Student::find($id);
        $student->name =$request->input('name');
        $student->email=$request->input('email');
        $student->phone=$request->input('phone');
        if($request->hasFile('profile_image')){
            $destination = 'uploads/students/'.$student->profile_image;
            if(File::exists($destination)) {
                File::delete($destination);
            }
            $file =$request->file('profile_image');
            $extension =$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/students/',$filename);
            $student->profile_image = $filename;
        }
        $student->update();
        return redirect()->back()->with('status','Doctor Info Updated Succesfully');
    }

    }
