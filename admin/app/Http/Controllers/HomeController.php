<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactModel;
use App\CoursesModel;
use App\ProjectModel;
use App\testimonialModel;
use App\ServicesModel;
use App\VisitorModel;

class HomeController extends Controller
{
    function HomeIndex(){
    

        $TotalContact= ContactModel::count();
       $TotalCourse=CoursesModel::count();
       $TotalProject=ProjectModel::count();
       $TotalReview=testimonialModel::count();
       $TotalService=ServicesModel::count();
       $TotalVisitor=VisitorModel::count();

        return view('Home',[
        	'TotalContact'=>$TotalContact,
            'TotalCourse'=>$TotalCourse,
            'TotalProject' =>$TotalProject,
            'TotalReview'=>$TotalReview,
            'TotalService'=>$TotalService,
            'TotalVisitor' =>$TotalVisitor
        ]);
    
    }
}
