<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use illuminate\Support\Str;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('updated_at', 'DESC')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // FAKE EMPTY MODEL FOR FORM
        $project = new Project();
        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // Prendo lo SLUG nella costruzione data
        $data['slug'] = Str::slug($data['title'], '-');

        $project = new Project();

        $project->fill($data);
        $project->save();

        return to_route('admin.projects.show', $project->id)->with('type', 'success')->with('New project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, project $project)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($data['title'], '-');
        $project->update($data);

        return to_route('admin.projects.show', $project->id)->with('type', 'success')->with('message', "Project : $project->title updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(project $project)
    {
        $project->delete();
        return to_route('admin.projects.index')->with('type', 'success')->with('message', "Project : $project->title saved successfully.");
    }
}
