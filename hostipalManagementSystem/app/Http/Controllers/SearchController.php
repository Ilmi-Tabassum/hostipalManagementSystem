<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class SearchController extends Controller
{

    public function indexG()
    {
        $student = Student::all();
        return view('student.indexing', compact('student'));
    }
}

