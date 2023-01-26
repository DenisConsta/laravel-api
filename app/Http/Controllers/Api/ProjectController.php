<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
       /*  $projects = Project::with(['type', 'user'])->paginate(10); */

        $projects = Project::all();
        return response()->json(compact('projects'));
    }
}
