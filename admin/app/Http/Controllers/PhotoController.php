<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\photoModel;
class PhotoController extends Controller
{
    function photoIndex(){
    

        return view('Photo');
    }

    function PhotoJSON(){
        return PhotoModel::all();
     }
     
    function PhotoUpload(Request $request){
        $photoPath=  $request->file('photo')->store('public');

        $photoName=(explode('/',$photoPath))[1];

        $host=$_SERVER['HTTP_HOST'];
        $location="http://".$host."/storage/".$photoName;

      $result= PhotoModel::insert(['location'=>$location]);
      return $result;
    }
}
