@extends('layouts.app')

@section('title', 'Editar recurso | CyberMedia Hub')

@section('content')

<div class="row justify-content-center">

    <div class="col-12 col-md-8 col-lg-6">

        <div class="card shadow-sm">

            <div class="card-header bg-dark text-white">
                <h2 class="h4 mb-0">Editar recurso</h2>
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

                <form
                    action="{{ route('resources.update', $resource) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Título</label>

                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            value="{{ old('title', $resource->title) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Categoría</label>

                        <input
                            type="text"
                            name="category"
                            class="form-control"
                            value="{{ old('category', $resource->category) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dificultad</label>

                        <select
                            name="difficulty"
                            class="form-select"
                            required>

                            <option value="Principiante"
                                {{ $resource->difficulty === 'Principiante' ? 'selected' : '' }}>
                                Principiante
                            </option>

                            <option value="Intermedio"
                                {{ $resource->difficulty === 'Intermedio' ? 'selected' : '' }}>
                                Intermedio
                            </option>

                            <option value="Avanzado"
                                {{ $resource->difficulty === 'Avanzado' ? 'selected' : '' }}>
                                Avanzado
                            </option>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Plataforma</label>

                        <input
                            type="text"
                            name="platform"
                            class="form-control"
                            value="{{ old('platform', $resource->platform) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Enlace del recurso</label>

                        <input
                            type="url"
                            name="media_url"
                            class="form-control"
                            value="{{ old('media_url', $resource->media_url) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descripción</label>

                        <textarea
                            name="description"
                            rows="5"
                            class="form-control"
                            required>{{ old('description', $resource->description) }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">

                        <a
                            href="{{ route('resources.index') }}"
                            class="btn btn-secondary">
                            Cancelar
                        </a>

                        <button
                            type="submit"
                            class="btn btn-warning">
                            Guardar cambios
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
