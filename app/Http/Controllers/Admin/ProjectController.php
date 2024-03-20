<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Recupero i dati del filtro nella request
        $filter = $request->query('filter');

        // Preparo la query
        $query = Project::orderByDesc('updated_at')->orderByDesc('created_at');

        // Se mi arriva qualcosa...
        if ($filter) {
            // Se mi arriva yes...
            $value = $filter === 'yes';
            // Filtro per i completati
            $query->whereIsCompleted($value);
            //! Se mi arriva no allora restituisco false e filtro per i non completati
        }

        //! Importante aggiungere withQueryString per mantenere il filtro al cambio pagina
        $projects = $query->paginate(10)->withQueryString();
        return view('admin.projects.index', compact('projects', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        $project->delete();

        return to_route('admin.projects.index')->with('message', 'Delete successful')->with('type', 'warning');
    }
}
