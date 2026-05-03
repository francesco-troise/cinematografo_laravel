@extends('layouts.app')

@section('title', 'Genere: ' . $genre->name)

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">

                <div class="card bg-dark text-white shadow-lg border-0 overflow-hidden">

                    <div style="height: 350px; width: 100%;">
                        <img src="{{ Storage::url($genre->url_image) }}" alt="{{ $genre->name }}"
                            class="w-100 h-100 object-fit-cover">
                    </div>

                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="text-primary fw-bold text-uppercase small">Scheda Genere</span>
                                <h1 class="fw-bold mt-1">{{ $genre->name }}</h1>
                            </div>

                            <div class="d-flex gap-2">
                                <a href="{{ route('genres.edit', $genre) }}" class="btn btn-outline-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Modifica
                                </a>

                                <form action="{{ route('genres.destroy', $genre) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Eliminare?')">
                                        <i class="bi bi-trash"></i> Elimina
                                    </button>
                                </form>
                            </div>
                        </div>

                        <p class="card-text fs-5 text-secondary">
                            {{ $genre->description }}
                        </p>

                        <hr class="border-secondary opacity-25 my-4">

                        <div class="d-flex justify-content-center">
                            <a href="{{ route('genres.index') }}" class="btn btn-primary px-4 py-2 rounded-pill fw-bold">
                                <i class="bi bi-arrow-left me-2"></i> Torna ai generi
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #141414;
        }

        .card {
            background-color: #181818;
        }
    </style>
@endsection
