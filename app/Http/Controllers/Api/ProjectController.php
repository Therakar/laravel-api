<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::with('type', 'technologies')->get();

        return $projects;
    }

    public function show($slug){
        try { //ogni richiesta che ha uno stato code diverso da 200 va nel metodo catch
            $project = Project::where('slug', $slug)->with('type', 'technologies')->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'error' => '404 Project not found'
            ], 404);
        }
        

        return $project;
    }
}
