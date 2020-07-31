<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\VisitorModel;
use App\ServicesModel;
use App\CoursesModel;
use App\ProjectModel;
use App\ContactModel;
use App\testimonialModel;

class HomeController extends Controller {
    
    function HomeIndex() {

        $UserIP = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate = date("Y-m-d h:i:sa");
        VisitorModel::insert(['ip_address'=>$UserIP, 'visit_time'=> $timeDate]);


        $servicesData=json_decode(ServicesModel::all());
        $coursesData=json_decode(CoursesModel::orderBy('id', 'desc')->limit(6)->get());
        $projectData=json_decode(ProjectModel::orderBy('id', 'desc')->limit(10)->get());
        $testimonial=json_decode(testimonialModel::all());
        return view('Home', [
            'servicesData'=>$servicesData,
            'coursesData'=>$coursesData, 
            'projectData'=>$projectData,
            'testimonial'=>$testimonial,

        ]);
    }


    function ContactSend(Request $Request){
        $contactName=$Request->input('contact_name');
        $contactPhone=$Request->input('contact_mobile');
        $contactEmail=$Request->input('contact_email');
        $contactMassage=$Request->input('contact_massage');

        $result=ContactModel::insert([
            'contact_name'=>$contactName,
            'contact_mobile'=>$contactPhone,
            'contact_email'=>$contactEmail,
            'contact_massage'=>$contactMassage
            ]);

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }









}


