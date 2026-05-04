@extends('layouts.app')
@section('title', 'All genres')

@section('content')
    <div class="container py-5">
        <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap">

            <div class="d-flex align-items-center">
                <h1 class="fw-bold text-primary mb-0">Esplora Generi</h1>

                <a href="{{ route('genres.create') }}"
                    class="btn bg-secondary-subtle text-primary btn-sm shadow-sm d-inline-flex align-items-center border-0 px-3 py-2 fw-bold ms-4">
                    Aggiungi un genere
                    <i class="bi bi-plus-circle-fill ms-2"></i>
                </a>

                <a href="{{ route('movies.index') }}"
                    class="btn bg-secondary-subtle text-primary btn-sm shadow-sm d-inline-flex align-items-center border-0 px-3 py-2 fw-bold ms-3">
                    <i class="bi bi-film me-2"></i>
                    Vai ai film
                </a>
            </div>

            <form action="{{ route('genres.index') }}" method="GET" class="d-flex align-items-center ms-auto">

                <div class="input-group">
                    <label class="input-group-text bg-transparent border-end-0 text-muted small" for="find_genre">
                        Ricerca
                    </label>
                    <select name="genre_id" id="find_genre" class="form-select form-select-sm border-start-0"
                        style="min-width: 180px;">
                        <option value="" selected>Tutti i generi...</option>
                        @foreach ($form_genres as $id => $name)
                            <option value="{{ $id }}">
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary btn-sm px-3" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>

                @if (request()->filled('genre_id'))
                    <a href="{{ route('genres.index') }}" class="btn btn-link btn-sm text-decoration-none ms-2">
                        Resetta
                    </a>
                @endif
            </form>
        </div>

        <div class="row g-4">
            @foreach ($genres as $genre)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-start">
                            <h2 class="h5 mb-0 fw-bold text-dark text-truncate" style="max-width: 50%;">
                                {{ $genre->name }}
                            </h2>

                            <div class="d-flex gap-2">
                                <a href="{{ route('genres.edit', $genre) }}"
                                    class="btn btn-outline-warning btn-sm shadow-sm d-inline-flex align-items-center">
                                    MODIFICA
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('genres.destroy', $genre) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-outline-danger btn-sm shadow-sm d-inline-flex align-items-center"
                                        onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">
                                        ELIMINA
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="card-body p-0 overflow-hidden" style="height: 300px;">
                            <a href="{{ route('genres.show', $genre) }}"><img src="{{ Storage::url($genre->url_image) }}"
                                    alt="img-genre" class="w-100 h-100 object-fit-cover"></a>
                        </div>

                        <div class="card-footer bg-white border-0 py-3">
                            <p class="card-text text-muted small">
                                {{ Str::limit($genre->description, 100) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
