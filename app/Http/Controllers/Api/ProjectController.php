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


        // validazione key per ricerca progetti
        request()->validate([
            'key' => 'nullable|string|min:3'
        ]);
        if (request()->key) {
            $projects = Project::where('title', 'LIKE', '%' . request()->key . '%')->orWhere('description', 'LIKE', '%' . request()->key . '%')->paginate(3);
            return response()->json([
                'status' => 'true',
                'data' => $projects
            ]);
        } else {
            // progetti con paginazione
            $projects = Project::paginate(3);
            return response()->json([
                'status' => 'true',
                'data' => $projects
            ]);
        }
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
