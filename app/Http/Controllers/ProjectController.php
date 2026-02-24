<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('user')->latest()->get();
        return view('projects.index', compact('projects'));
    }

    /**
     * Display only the authenticated user's projects.
     */
    public function userProjects()
    {
        $projects = Project::where('user_id', Auth::id())->latest()->get();
        return view('projects.user-projects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'github_url' => ['nullable', 'url'],
            'website_url' => ['nullable', 'url'],
            'status' => ['required', 'in:planning,development,completed,on-hold,discontinued'],
        ]);

        $validated['user_id'] = $request->user()->id;
        Project::create($validated);

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);

        if (Auth::id() !== $project->user_id && !Auth::user()?->is_admin) {
            abort(403);
        }

        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);

        if (Auth::id() !== $project->user_id && !Auth::user()?->is_admin) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'github_url' => ['nullable', 'url'],
            'website_url' => ['nullable', 'url'],
            'status' => ['required', 'in:planning,development,completed,on-hold,discontinued'],
        ]);

        $project->update($validated);

        return redirect()->route('projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);

        if (Auth::id() !== $project->user_id && !Auth::user()?->is_admin) {
            abort(403);
        }

        $project->delete();

        return redirect()->route('projects.user');
    }
}
