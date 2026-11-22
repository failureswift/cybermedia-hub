@extends('layouts.app')

@section('title', 'Recursos | CyberMedia Hub')

@section('content')

<div class="d-flex flex-column flex-md-row
            justify-content-between align-items-md-center mb-4">

    <div>
        <h1 class="fw-bold">
            Recursos de ciberseguridad
        </h1>

        <p class="text-muted">
            Explora y administra recursos digitales para
            aprender sobre seguridad informática.
        </p>
    </div>

    <div class="mt-3 mt-md-0">
        <a href="{{ route('resources.create') }}"
           class="btn btn-primary">
            + Agregar recurso
        </a>
    </div>

</div>


@if($resources->isEmpty())

    <div class="alert alert-info">
        No hay recursos registrados todavía.
    </div>

@else

    <div class="row g-4">

        @foreach($resources as $resource)

            <div class="col-12 col-md-6 col-lg-4">

                <div class="card h-100 shadow-sm">

                    <div class="card-body">

                        <span class="badge bg-dark mb-2">
                            {{ $resource->category }}
                        </span>

                        <h5 class="card-title fw-bold">
                            {{ $resource->title }}
                        </h5>

                        <p class="text-muted mb-2">
                            <strong>Dificultad:</strong>
                            {{ $resource->difficulty }}
                        </p>

                        <p class="text-muted">
                            <strong>Plataforma:</strong>
                            {{ $resource->platform }}
                        </p>

                        <p class="card-text">
                            {{ Str::limit($resource->description, 120) }}
                        </p>

                    </div>

                    <div class="card-footer bg-white border-0 pb-3">

                        <div class="d-grid gap-2">

                            <a href="{{ route('resources.show', $resource) }}"
                               class="btn btn-outline-primary">
                                Ver recurso
                            </a>

                            <a href="{{ $resource->media_url }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="btn btn-danger">
                                Ver en {{ $resource->platform }}
                            </a>

                            <a href="{{ route('resources.edit', $resource) }}"
                               class="btn btn-warning">
                                Editar
                            </a>

                            <form
                                action="{{ route('resources.destroy', $resource) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-outline-danger w-100"
                                    onclick="return confirm('¿Eliminar este recurso?')">

                                    Eliminar

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

@endif

@endsection