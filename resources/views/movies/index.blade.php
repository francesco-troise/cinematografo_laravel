@extends('layouts.app')
@section('title', 'All Movies')

@section('content')

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-6 fw-bold text-primary">Lista Film</h1>
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
