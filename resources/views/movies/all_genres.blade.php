@extends('layouts.app')
@section('title', 'All genres')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4 fw-bold text-primary">Esplora Generi</h1>

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
                            <img src="{{ Storage::url($genre->url_image) }}" alt="img-genre"
                                class="w-100 h-100 object-fit-cover">
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
