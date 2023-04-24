<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {

        // In $request ho già i dati compresi di validazione
        $data = $request->validated();

        // All'interno di $request non ho il valore 'slug' da inserire nel DB, perche' viene generato in automatico e
        // e non inserito da Utente nel Form quindi devo inserirlo manualmente per evitare errore
        $data['slug'] = Str::slug($data['name']);

        // Aggiungere variabile $fillable in Model per usare 'create'
        $project = Project::create($data);

        return to_route('projects.show', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // In $request ho già i dati compresi di validazione
        $data = $request->validated();

        // All'interno di $request non ho il valore 'slug' da inserire nel DB, perche' viene generato in automatico e
        // e non inserito da Utente nel Form quindi devo inserirlo manualmente per evitare errore
        // In caso di modifica titolo ricreo lo 'slug'
        if ($data['name'] !== $project['name']) {
            $data['slug'] =  Str::slug($data['name']);
        }

        // Modifico i valori del Progetto ($project) con quelli presenti nella Request ($data) ottenuti vdal Form
        $project->update($data);

        return to_route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
