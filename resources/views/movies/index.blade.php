@extends('layouts.app')
@section('title', 'All Movies')

@section('content')

    <div class="container py-5">

        <div class="d-flex flex-column flex-xl-row justify-content-between align-items-center mb-5 gap-4">
            <div>
                <h1 class="display-5 fw-bold text-primary mb-0">
                    <i class="bi bi-collection-play me-2"></i>Lista Film
                </h1>
                <p class="text-muted mb-0">Gestisci e filtra il catalogo completo dei film</p>
            </div>

            <a href="{{ route('movies.create') }}"
                class="btn bg-secondary-subtle text-primary btn-sm shadow-sm d-inline-flex align-items-center border-0 px-3 py-2 fw-bold ms-3">
                <i class="bi bi-film me-2"></i>
                Aggiungi un nuovo film
            </a>

            <div class="d-flex flex-wrap gap-3 justify-content-center">
                <a href="{{ route('genres.index') }}"
                    class="btn btn-white border shadow-sm rounded-pill px-4 py-2 text-primary fw-semibold transition-all">
                    <i class="bi bi-tags-fill me-2 text-secondary"></i>Vai ai generi
                </a>

                <a href="{{ route('people.index') }}"
                    class="btn btn-white border shadow-sm rounded-pill px-4 py-2 text-primary fw-semibold transition-all">
                    <i class="bi bi-people-fill me-2 text-secondary"></i>Catalogo attori/registi
                </a>
            </div>
        </div>

        <!--Sezione Filtri-->
        <div class="card shadow-sm border-0 bg-white rounded-4 overflow-hidden">
            <div class="card-header bg-light border-0 py-3 ps-4">
                <h5 class="mb-0 fs-6 text-uppercase fw-bold text-muted letter-spacing-1">
                    <i class="bi bi-sliders me-2"></i>Filtri di Ricerca
                </h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('movies.index') }}" method="GET" class="row g-4 align-items-end">

                    <!--Filtro Titolo-->
                    <div class="col-lg-4">
                        <label for="title" class="form-label small fw-bold text-secondary">Titolo Film</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" name="title" id="title"
                                class="form-control border-start-0 bg-light shadow-none" placeholder="Inserisci titolo..."
                                value="{{ request('title') }}">
                        </div>
                    </div>

                    <!--Filtro Genere-->
                    <div class="col-md-6 col-lg-3">
                        <label for="genre_id" class="form-label small fw-bold text-secondary">Genere</label>
                        <select name="genre_id" id="genre_id" class="form-select bg-light border-0 shadow-none py-2">
                            <option value="">Tutti i generi</option>
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}"
                                    {{ request('genre_id') == $genre->id ? 'selected' : '' }}>
                                    {{ $genre->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!--Filtro Regist -->
                    <div class="col-md-6 col-lg-3">
                        <label for="director_id" class="form-label small fw-bold text-secondary">Regista</label>
                        <select name="director_id" id="director_id" class="form-select bg-light border-0 shadow-none py-2">
                            <option value="">Tutti i registi</option>
                            @foreach ($directors as $director)
                                <option value="{{ $director->id }}"
                                    {{ request('director_id') == $director->id ? 'selected' : '' }}>
                                    {{ $director->name }} {{ $director->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-lg-2">
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary flex-grow-1 py-2 fw-bold shadow-sm">
                                Filtra
                            </button>
                            <a href="{{ route('movies.index') }}"
                                class="btn btn-outline-light border text-muted py-2 px-3 shadow-sm" title="Resetta filtri">
                                <i class="bi bi-arrow-counterclockwise"></i>
                            </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark shadow-sm">
                        <tr class="border-0">
                            <th class="ps-4 py-3 border-0">Titolo</th>
                            <th class="py-3 border-0">Regista</th>
                            <th class="py-3 border-0">Genere</th>
                            <th class="py-3 border-0">Durata</th>
                            <th class="py-3 border-0">Pegi</th>
                            <th class="text-end pe-4 py-3 border-0">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movies as $movie)
                            <tr>
                                <td class="ps-4 fw-bold">
                                    <a class="text-decoration-none text-reset"
                                        href="{{ route('movies.show', $movie) }}">{{ $movie->title }}</a>
                                </td>
                                <td>{{ $movie->getDirectorName() }}</td>
                                <td>
                                    @foreach ($movie->getGenres() as $genre)
                                        <span class="badge rounded-pill bg-secondary-subtle text-dark fw-bold me-2">
                                            <a class="text-decoration-none text-dark"
                                                href="{{ route('genres.show', $genre) }}">
                                                {{ $genre->name }}
                                            </a>
                                        </span>
                                    @endforeach
                                </td>
                                <td>{{ $movie->duration }}''</td>
                                <td>
                                    <span class="badge border text-secondary">
                                        {{ $movie->pegi }}
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('movies.edit', $movie) }}"
                                            class="btn btn-warning btn-sm shadow-sm d-inline-flex align-items-center">
                                            <i class="bi bi-pencil me-1"></i> Modifica film
                                        </a>

                                        <form action="{{ route('movies.destroy', $movie) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger btn-sm shadow-sm d-inline-flex align-items-center"
                                                onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">
                                                <i class="bi bi-trash me-1"></i> Elimina film
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
