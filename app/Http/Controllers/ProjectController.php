<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Client;

class ProjectController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::with('client')->active()->featured()->ordered()->get();
        $allProjects = Project::with('client')->active()->ordered()->paginate(12);
        
        return view('projects.index', compact('featuredProjects', 'allProjects'));
    }

    public function show(Project $project)
    {
        $project->load('client');
        
        // Get related projects (same client)
        $relatedProjects = Project::with('client')
            ->active()
            ->where('id', '!=', $project->id)
            ->where('client_id', $project->client_id)
            ->ordered()
            ->take(3)
            ->get();

        return view('projects.show', compact('project', 'relatedProjects'));
    }
}

