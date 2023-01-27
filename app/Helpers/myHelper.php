<?php

namespace App\Helpers;

use App\Models\Project;


class myHelper
{
    public static function checkImage(Project $project)
    {
        if (!(substr($project->cover_image, 0, 4) == 'http') && !is_null($project->cover_image)){
            $project->cover_image = url("storage/" . $project->cover_image);
        }

        else if (is_null($project->cover_image)){
            $project->cover_image = url("storage/uploads/placeholder.jpg");
        }

        return $project;
    }
}
