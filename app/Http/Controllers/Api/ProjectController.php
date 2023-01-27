<?php

namespace App\Http\Controllers\Api;

use App\Helpers\myHelper;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['type', 'user'])->paginate(10);

        foreach($projects as $project)
            $project = myHelper::checkImage($project);

        return response()->json(compact('projects'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->with(['type', 'user'])->first();
        $project = myHelper::checkImage($project);
        return response()->json(compact('project'));

    }
}
