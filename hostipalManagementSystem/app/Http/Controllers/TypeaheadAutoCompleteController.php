<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TypeaheadAutoCompleteController extends Controller
{
    function index(){
        return view('typeahead_autocomplete');
    }


    function action(Request $request){
    $data =$request ->all();
    $query =$data['query'];

    $filter_data = User::select('name')
        ->where('name','LIKE','%' .$query.'%')
        ->get();
//    $filter_data1 = User::select('email')
//        ->where('email','LIKE','%' .$query.'%')
//        ->get();

    return response()->json($filter_data);
    }
}
