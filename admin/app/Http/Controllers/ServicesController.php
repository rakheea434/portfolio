<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServicesModel;

class ServicesController extends Controller
{
   function ServicesIndex(){

    return view('Services');
}

function servicesData(){
    $result= json_encode(ServicesModel::orderBy('id', 'desc')->get());
    return $result;
}
function getServiceDetails(Request $Req){
    $id=$Req->input('id');
    $result= json_encode(ServicesModel::where('id', '=', $id)->get());
    return $result;
}

function serviceDelete(Request $Req){
    $id=$Req->input('id');
    $result=ServicesModel::where('id', '=', $id)->delete();
    if($result==true){
        return 1;
    }else{
        return 0;
    }
    
}

function serviceUpdate(Request $Req){
    $id=$Req->input('id');
    $name=$Req->input('name');
    $description=$Req->input('description');
    $image=$Req->input('image');
    
    $result=ServicesModel::where('id', '=', $id)->update(['service_name'=>$name, 'service_des'=>$description, 'service_img'=>$image]);
    if($result==true){
        return 1;
    }else{
        return 0;
    }
    
}

function ServiceAdd(Request $req){
    $name= $req->input('name');
    $des= $req->input('des');
    $img= $req->input('img');
    $result= ServicesModel::insert(['service_name'=>$name,'service_des'=>$des,'service_img'=>$img]);

    if($result==true){      
      return 1;
    }
    else{
     return 0;
    }
}





}