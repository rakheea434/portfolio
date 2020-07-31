<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoursesModel;
class CourseController extends Controller
{
    function coursesIndex() {

        $courceData=json_decode(CoursesModel::all());

        return view('Course', ['courceData'=>$courceData]);
    }
}
