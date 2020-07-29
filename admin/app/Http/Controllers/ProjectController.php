<?php

namespace App\Http\Controllers;

use App\ProjectModel;
use Illuminate\Http\Request;

class ProjectController extends Controller {
    function ProjectIndex() {
        return view('Project');
    }

    function getProjectData() {
        $result = json_encode(ProjectModel::orderBy('id', 'desc')->get());
        return $result;
    }

    function ProjectDelete(Request $Req) {
        $id = $Req->input('id');
        $result = ProjectModel::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }

    }

    function getProjectDetails(Request $Req) {
        $id = $Req->input('id');
        $result = json_encode(ProjectModel::where('id', '=', $id)->get());
        return $result;
    }

    function projectUpdate(Request $Req) {
        $id = $Req->input('id');
        $name = $Req->input('name');
        $description = $Req->input('description');
        $image = $Req->input('image');

        $result = ProjectModel::where('id', '=', $id)->update(['project_title' => $name, 'project_description' => $description, 'project_image' => $image]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }

    }

    function projectAdd(Request $req) {
        $name = $req->input('name');
        $des = $req->input('des');
        $img = $req->input('img');
        $result = ProjectModel::insert(['project_title' => $name, 'project_description' => $des, 'project_image' => $img]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

}
