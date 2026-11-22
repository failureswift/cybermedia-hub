@extends('layouts.app')

@section('title', $resource->title . ' | CyberMedia Hub')

@section('content')

<div class="row justify-content-center">

    <div class="col-12 col-lg-8">

        <div class="card shadow-sm">

            <div class="card-body">

                <span class="badge bg-dark mb-3">
                    {{ $resource->category }}
                </span>

                <h1 class="fw-bold">
                    {{ $resource->title }}
                </h1>

                <p class="text-muted">
                    <strong>Dificultad:</strong>
                    {{ $resource->difficulty }}
                </p>

                <p class="text-muted">
                    <strong>Plataforma:</strong>
                    {{ $resource->platform }}
                </p>

                <hr>

                <h5>Descripción</h5>

                <p>
                    {{ $resource->description }}
                </p>

                <div class="d-grid gap-2 d-md-flex mt-4">

                    <a
                        href="{{ $resource->media_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="btn btn-danger">
                        Abrir recurso en {{ $resource->platform }}
                    </a>

                    <a
                        href="{{ route('resources.edit', $resource) }}"
                        class="btn btn-warning">
                        Editar
                    </a>

                    <a
                        href="{{ route('resources.index') }}"
                        class="btn btn-secondary">
                        Volver
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
