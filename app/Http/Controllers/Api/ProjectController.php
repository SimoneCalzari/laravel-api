<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // solo progetti senza type e technologies associate
        // $projects = Project::all();

        // progetti con tipo  e tecnologie
        // $projects = Project::with('type', 'technologies')->get();

        // progetti con paginazione
        $projects = Project::paginate(3);
        return response()->json([
            'status' => 'true',
            'data' => $projects
        ]);
    }

    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();
        return response()->json([
            'status' => 'true',
            'data' => $project
        ]);
    }
}
