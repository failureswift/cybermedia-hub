@extends('layouts.app')

@section('title', 'Agregar recurso | CyberMedia Hub')

@section('content')

<div class="row justify-content-center">

    <div class="col-12 col-md-8 col-lg-6">

        <div class="card shadow-sm">

            <div class="card-header bg-dark text-white">
                <h2 class="h4 mb-0">Agregar recurso</h2>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('resources.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Título</label>

                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="form-control"
                            value="{{ old('title') }}"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Categoría</label>

                        <select
                            name="category"
                            id="category"
                            class="form-select"
                            required
                        >
                            <option value="">Selecciona una categoría</option>
                            <option value="Networking">Networking</option>
                            <option value="Web Security">Web Security</option>
                            <option value="Pentesting">Pentesting</option>
                            <option value="Malware">Malware</option>
                            <option value="OSINT">OSINT</option>
                            <option value="Defensive Security">Defensive Security</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="difficulty" class="form-label">Dificultad</label>

                        <select
                            name="difficulty"
                            id="difficulty"
                            class="form-select"
                            required
                        >
                            <option value="">Selecciona una dificultad</option>
                            <option value="Principiante">Principiante</option>
                            <option value="Intermedio">Intermedio</option>
                            <option value="Avanzado">Avanzado</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="platform" class="form-label">Plataforma</label>

                        <select
                            name="platform"
                            id="platform"
                            class="form-select"
                            required
                        >
                            <option value="">Selecciona una plataforma</option>
                            <option value="YouTube">YouTube</option>
                            <option value="Vimeo">Vimeo</option>
                            <option value="GitHub">GitHub</option>
                            <option value="TryHackMe">TryHackMe</option>
                            <option value="Hack The Box">Hack The Box</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="media_url" class="form-label">
                            Enlace del recurso
                        </label>

                        <input
                            type="url"
                            name="media_url"
                            id="media_url"
                            class="form-control"
                            placeholder="https://..."
                            value="{{ old('media_url') }}"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">
                            Descripción
                        </label>

                        <textarea
                            name="description"
                            id="description"
                            rows="5"
                            class="form-control"
                            required
                        >{{ old('description') }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">

                        <a
                            href="{{ route('resources.index') }}"
                            class="btn btn-secondary">
                            Volver
                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary">
                            Guardar recurso
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection