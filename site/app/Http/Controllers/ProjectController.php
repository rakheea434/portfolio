<?php

namespace App\Http\Controllers;

use App\ProjectModel;

class ProjectController extends Controller {
    function projectIndex() {

        $projectData=json_decode(ProjectModel::all());

        return view('Project', ['projectData'=>$projectData]);
    }
}
