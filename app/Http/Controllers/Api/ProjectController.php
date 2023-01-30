<?php

namespace App\Http\Controllers\Api;

use App\Helpers\myHelper;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['type', 'user', 'technologies'])->paginate(10);
        $technologies = Technology::all();
        $types = Type::all();

        foreach($projects as $project)
            $project = myHelper::checkImage($project);

        return response()->json(compact('projects', 'technologies', 'types'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->with(['type', 'user'])->first();
        $project = myHelper::checkImage($project);
        return response()->json(compact('project'));
    }

    public function search(){
        $tosearch = $_GET['tosearch'];
        $projects = Project::where('name', 'like', "%$tosearch%")->with(['type', 'user', 'technologies'])->paginate(10);

        foreach($projects as $project)
            $project = myHelper::checkImage($project);


        return response()->json(compact('projects'));
    }
}
