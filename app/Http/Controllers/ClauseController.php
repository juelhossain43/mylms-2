<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClauseController extends Controller
{
    public function show($id){
        return view('course.clause.show',['id'=>$id]);
    }
    public function edit($id){
        return view('course.clause.edit',['id'=>$id]);
    }
}
