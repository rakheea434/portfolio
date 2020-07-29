<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;

class VisitorController extends Controller
{
    function VisitorIndex(){
    
        $visitorData=json_decode(VisitorModel::orderBy('id','desc')->take(1000)->get());

        return view('Visitor',['visitorData'=>$visitorData]);
    }
}
