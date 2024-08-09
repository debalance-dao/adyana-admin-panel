<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::get();
        return view('admin.project.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'funds_target' => 'required',
            'days_target' => 'required',
            'image_file' => 'required|file',
        ]);

        if ($validator->fails()) {
            redirect()->route('projects.create')->with(['error' => 'Data cannot to be save!']);
        }

        $req = $request->all();
        $image = $request->file('image_file');
        if ($image != null) {
            $image->storeAs('public/image_files', $image->hashName());
            $req['image_file'] = $image->hashName();
        }

        Project::create($req);

        return redirect()->route('projects.index')->with(['success' => 'Data Saved!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $project['image'] = Storage::url('image_files/' . $project['image_file']);
        return view('admin.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'funds_target' => 'required',
            'days_target' => 'required',
            'image_file' => 'required|file',
        ]);

        if ($validator->fails()) {
            redirect()->route('projects.edit', [$project->id])->with(['error' => 'Data cannot to be save!']);
        }

        $req = $request->all();
        $image = $request->file('image_file');
        if ($image != null) {
            Storage::delete('public/image_files/' . $project->image_file);
            $image->storeAs('public/image_files', $image->hashName());
            $req['image_file'] = $image->hashName();
        }

        $project->update($req);

        return redirect()->route('projects.index')->with(['success' => 'Data Saved!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            Storage::delete('public/image_files/' . $project->image_file);
            $project->delete();
            if (request()->header('Content-Type') === "application/json") {
                return response()->json($project);
            }
            return redirect()->route('projects.index')->with(['success' => 'Data Deleted!']);
        } catch (\Exception $e) {
            return redirect()->route('projects.index')->with(['error' => 'Data Cannot be Deleted!']);
        }
    }
}
