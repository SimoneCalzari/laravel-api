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
        $projects = Project::with('type', 'technologies')->get();
        // progetti con paginazione
        $projects = Project::with('type', 'technologies')->paginate(3);
        return response()->json([
            'success' => 'Top',
            'data' => $projects
        ]);
    }
}
