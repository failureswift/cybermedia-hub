<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    // Mostrar todos los recursos
    public function index()
    {
        $resources = Resource::all();

        return view('resources.index', compact('resources'));
    }

    // Mostrar formulario para crear un recurso
    public function create()
    {
        return view('resources.create');
    }

    // Guardar un nuevo recurso
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'difficulty' => 'required|string|max:100',
            'platform' => 'required|string|max:100',
            'media_url' => 'required|url|max:500',
        ]);

        Resource::create($validated);

        return redirect()
            ->route('resources.index')
            ->with('success', 'Recurso agregado correctamente.');
    }

    // Mostrar un recurso individual
    public function show(Resource $resource)
    {
        return view('resources.show', compact('resource'));
    }

    // Mostrar formulario de edición
    public function edit(Resource $resource)
    {
        return view('resources.edit', compact('resource'));
    }

    // Actualizar un recurso
    public function update(Request $request, Resource $resource)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'difficulty' => 'required|string|max:100',
            'platform' => 'required|string|max:100',
            'media_url' => 'required|url|max:500',
        ]);

        $resource->update($validated);

        return redirect()
            ->route('resources.index')
            ->with('success', 'Recurso actualizado correctamente.');
    }

    // Eliminar un recurso
    public function destroy(Resource $resource)
    {
        $resource->delete();

        return redirect()
            ->route('resources.index')
            ->with('success', 'Recurso eliminado correctamente.');
    }
}