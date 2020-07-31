<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\testimonialModel;

class testimonialController extends Controller
{
    function testimonialIndex(){
        return view('Testimonial');
    }

    function getTestimonialData(){
        $result= json_encode(testimonialModel::orderBy('id', 'desc')->get());
        return $result;
    }


    function testimonialDelete(Request $Req){
        $id=$Req->input('id');
        $result=testimonialModel::where('id', '=', $id)->delete();
        if($result==true){
            return 1;
        }else{
            return 0;
        }
        
    }

    function getTestimonialDetails(Request $Req){
        $id=$Req->input('id');
        $result= json_encode(testimonialModel::where('id', '=', $id)->get());
        return $result;
    }

    function testimonialUpdate(Request $Req){
        $id=$Req->input('id');
        $name=$Req->input('name');
        $description=$Req->input('description');
        $image=$Req->input('image');
        
        $result=testimonialModel::where('id', '=', $id)->update(['testimonial_name'=>$name, 'testimonial_description'=>$description, 'testimonial_image'=>$image]);
        if($result==true){
            return 1;
        }else{
            return 0;
        }
        
    }

    function testimonialAdd(Request $req){
        $name= $req->input('name');
        $des= $req->input('des');
        $img= $req->input('img');
        $result= testimonialModel::insert(['testimonial_name'=>$name,'testimonial_description'=>$des,'testimonial_image'=>$img]);
    
        if($result==true){      
          return 1;
        }
        else{
         return 0;
        }
    }



}
