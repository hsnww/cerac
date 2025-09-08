<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Client;
use App\Models\SiteSetting;

class ProjectController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::getSettings();
        $featuredProjects = Project::with('client')->active()->featured()->ordered()->get();
        $allProjects = Project::with('client')->active()->ordered()->paginate(12);
        
        return view('projects.index', compact('featuredProjects', 'allProjects', 'settings'));
    }

    public function show(Project $project)
    {
        $settings = SiteSetting::getSettings();
        $project->load('client', 'media');
        
        // Get related projects (same client)
        $relatedProjects = Project::with('client')
            ->active()
            ->where('id', '!=', $project->id)
            ->where('client_id', $project->client_id)
            ->ordered()
            ->take(3)
            ->get();

        return view('projects.show', compact('project', 'relatedProjects', 'settings'));
    }
}

