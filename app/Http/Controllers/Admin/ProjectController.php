<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // guarda in appServiceProvider la pagination - ne voglio 10 a pagina
        $projects=Project::paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        $types= Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('project', 'types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // data e name son customizzati perché in create non ci sono dato che obv li creo io e ora
        $data =$request->validated();

        // prendo il file e lo metto in storage/img/projects
        // salva nel db l'indirizzo locale a cui questo file uploadato si trova
        $img_path = Storage::put('uploads/projects', $data['image']);

        $data['image'] = $img_path;
        $data['author']=Auth::user()->id;
        $data['date']=Carbon::now();
        // uso fillable - guarda in model
        $newProject= Project::create($data);
        // dopo che hai creato il project, prendilo, prendi etecnologie come rleaione e sincronizzaci la llista deu proettti che hai
        $newProject->technologies()->sync($data["technologies"]);
        return redirect()->route('admin.projects.show', $newProject->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // usiamo la dependency
    public function edit(Project $project)
    {
        $types= Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact("project", "types", "technologies"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, string $id)
    {
        $data=$request->validated();
        $project = Project::findOrFail($id);
        $newProject=$project->update($data);
        $project->technologies()->sync($data["technologies"]);

        return redirect()->route("admin.projects.show", $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->technologies()->detach();
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
